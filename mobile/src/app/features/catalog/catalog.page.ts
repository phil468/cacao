import { CurrencyPipe } from '@angular/common';
import { Component, computed, inject, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { IonButton, IonCheckbox, IonContent, IonHeader, IonSearchbar, IonSelect, IonSelectOption, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { finalize } from 'rxjs';
import { ApiService } from '../../core/api.service';
import { CartService } from '../../core/cart.service';
import { FavoritesService } from '../../core/favorites.service';
import { Product, ProductVariant, publicAssetUrl } from '../../core/models';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

interface CatalogVariant { product: Product; variant: ProductVariant; }

@Component({
  standalone: true,
  imports: [CurrencyPipe, FormsModule, RouterLink, IonButton, IonCheckbox, IonContent, IonHeader, IonSearchbar, IonSelect, IonSelectOption, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Catálogo</ion-title></ion-toolbar></ion-header>
    <ion-content>
      <div class="catalog-search-row">
        <ion-searchbar placeholder="Buscar producto o sabor" [debounce]="350" [(ngModel)]="search" (ionInput)="applyFilters()" />
      </div>
      <nav class="catalog-category-chips" aria-label="Categorías">
        <button [class.active]="!category" (click)="category = ''; applyFilters()">Todo</button>
        @for (item of categories(); track item.slug) {
          <button [class.active]="category === item.slug" (click)="category = item.slug; applyFilters()">{{ item.name }}</button>
        }
      </nav>
      <section class="catalog-filters">
        <ion-select label="Porcentaje de cacao" interface="popover" [(ngModel)]="cacao" (ionChange)="applyFilters()">
          <ion-select-option value="">Todos</ion-select-option>
          @for (value of cacaoOptions; track value) { <ion-select-option [value]="value">{{ value }}%</ion-select-option> }
        </ion-select>
        <ion-select label="Ordenar" interface="popover" [(ngModel)]="sort">
          <ion-select-option value="recommended">Recomendados</ion-select-option>
          <ion-select-option value="price_asc">Menor precio</ion-select-option>
          <ion-select-option value="price_desc">Mayor precio</ion-select-option>
        </ion-select>
        <ion-checkbox [(ngModel)]="available" (ionChange)="applyFilters()">Solo disponibles</ion-checkbox>
        <ion-checkbox [(ngModel)]="promotional" (ionChange)="applyFilters()">Con promoción</ion-checkbox>
      </section>

      @if (loading()) {
        <div class="catalog-skeleton-grid">@for (item of [1,2,3,4,5,6]; track item) { <div class="catalog-skeleton"></div> }</div>
      } @else if (error()) {
        <section class="empty-state"><p class="form-error">{{ error() }}</p><ion-button (click)="load()">Reintentar</ion-button></section>
      } @else {
        <section class="variant-catalog-grid">
          @for (item of sortedVariants(); track item.variant.id) {
            <article class="variant-card" [class.sold-out]="item.variant.stock < 1">
              <div class="variant-image-wrap">
                <a [routerLink]="['/product', item.product.slug]">
                  @if (image(item); as url) { <img [src]="url" [alt]="item.variant.name"> }
                  @else { <div class="image-placeholder"><small>{{ item.product.category?.name }}</small><strong>{{ item.variant.name }}</strong></div> }
                </a>
                <button class="favorite-button" [class.active]="favorites.has(item.variant.id)" (click)="toggleFavorite(item.variant.id)" [attr.aria-label]="favorites.has(item.variant.id) ? 'Quitar de favoritos' : 'Agregar a favoritos'">
                  {{ favorites.has(item.variant.id) ? '♥' : '♡' }}
                </button>
              </div>
              <div class="variant-card-body">
                <small>{{ item.product.name }}</small>
                <h2>{{ item.variant.name }}</h2>
                <p>{{ details(item.variant) }}</p>
                @if (item.variant.promotional_price_amount) {
                  <span class="old-price">{{ item.variant.price_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</span>
                }
                <strong>{{ price(item.variant) / 100 | currency:'PEN':'symbol':'1.2-2' }}</strong>
                @if (item.variant.stock > 0) {
                  <ion-button expand="block" (click)="quickAdd(item)">Agregar</ion-button>
                } @else { <b class="sold-out-label">Agotado</b> }
              </div>
            </article>
          } @empty { <section class="empty-state"><p>No encontramos presentaciones con esos filtros.</p><ion-button (click)="clearFilters()">Limpiar filtros</ion-button></section> }
        </section>
      }
      @if (message()) { <p class="success-message" role="status">{{ message() }}</p> }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class CatalogPage {
  private readonly api = inject(ApiService);
  private readonly route = inject(ActivatedRoute);
  private readonly router = inject(Router);
  private readonly cart = inject(CartService);
  readonly favorites = inject(FavoritesService);
  readonly products = signal<Product[]>([]);
  readonly loading = signal(false);
  readonly error = signal('');
  readonly message = signal('');
  readonly cacaoOptions = ['60', '70', '80', '100'];
  readonly categories = computed(() => {
    const unique = new Map<string, string>();
    this.products().forEach(product => { if (product.category) unique.set(product.category.slug, product.category.name); });
    return [...unique].map(([slug, name]) => ({ slug, name }));
  });
  readonly variants = computed<CatalogVariant[]>(() => this.products().flatMap(product => product.variants.map(variant => ({ product, variant }))));
  readonly sortedVariants = computed(() => [...this.variants()].sort((a, b) => {
    if (this.sort === 'price_asc') return this.price(a.variant) - this.price(b.variant);
    if (this.sort === 'price_desc') return this.price(b.variant) - this.price(a.variant);
    return Number(b.product.is_featured) - Number(a.product.is_featured);
  }));
  search = '';
  category = '';
  cacao = '';
  sort = 'recommended';
  available = false;
  promotional = false;

  constructor() {
    this.route.queryParamMap.subscribe(params => {
      this.search = params.get('search') ?? '';
      this.category = params.get('category') ?? '';
      this.load();
    });
  }

  applyFilters(): void {
    void this.router.navigate([], {
      relativeTo: this.route,
      queryParams: { search: this.search || null, category: this.category || null },
      queryParamsHandling: 'merge',
      replaceUrl: true,
    });
    this.load();
  }

  load(): void {
    const params: Record<string, string> = {};
    if (this.search.trim()) params['search'] = this.search.trim();
    if (this.category) params['category'] = this.category;
    if (this.cacao) params['cacao'] = this.cacao;
    if (this.available) params['available'] = '1';
    if (this.promotional) params['promotional'] = '1';
    this.loading.set(true);
    this.error.set('');
    this.api.products(params).pipe(finalize(() => this.loading.set(false))).subscribe({
      next: response => this.products.set(response.data),
      error: error => this.error.set(error.message),
    });
  }

  clearFilters(): void {
    this.search = ''; this.category = ''; this.cacao = ''; this.available = false; this.promotional = false;
    this.applyFilters();
  }

  quickAdd(item: CatalogVariant): void {
    this.cart.add({
      variantId: item.variant.id,
      name: `${item.product.name} — ${item.variant.name}`,
      priceAmount: this.price(item.variant),
      quantity: 1,
      stock: item.variant.stock,
      imageUrl: this.image(item),
    });
    this.message.set(`${item.variant.name} se agregó al carrito.`);
    window.setTimeout(() => this.message.set(''), 2400);
  }

  async toggleFavorite(variantId: number): Promise<void> {
    try { await this.favorites.toggle(variantId); }
    catch (error) { this.error.set(error instanceof Error ? error.message : 'No pudimos actualizar tus favoritos.'); }
  }

  image(item: CatalogVariant): string | null {
    return publicAssetUrl(item.variant.image?.path ?? item.product.images.find(image => image.is_primary && !image.product_variant_id)?.path);
  }
  price(variant: ProductVariant): number { return variant.promotional_price_amount ?? variant.price_amount; }
  details(variant: ProductVariant): string {
    return [variant.cacao_percentage ? `${variant.cacao_percentage}% cacao` : null, variant.weight_grams ? `${variant.weight_grams} g` : null].filter(Boolean).join(' · ');
  }
}
