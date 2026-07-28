import { CurrencyPipe } from '@angular/common';
import { Component, computed, inject, signal } from '@angular/core';
import { RouterLink } from '@angular/router';
import { IonButton, IonContent, IonHeader, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { finalize } from 'rxjs';
import { ApiService } from '../../core/api.service';
import { CartService } from '../../core/cart.service';
import { FavoritesService } from '../../core/favorites.service';
import { Product, ProductVariant, publicAssetUrl } from '../../core/models';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [CurrencyPipe, RouterLink, IonButton, IonContent, IonHeader, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Favoritos</ion-title></ion-toolbar></ion-header>
    <ion-content>
      <section class="page-intro"><small>TUS ELEGIDOS</small><h1>Favoritos</h1><p>Guarda tus sabores preferidos para encontrarlos rápidamente.</p></section>
      @if (loading()) {
        <p class="loading-state">Cargando favoritos…</p>
      } @else {
        <section class="variant-catalog-grid">
          @for (item of items(); track item.variant.id) {
            <article class="variant-card" [class.sold-out]="item.variant.stock < 1">
              <div class="variant-image-wrap">
                <a [routerLink]="['/product', item.product.slug]">
                  @if (image(item.product, item.variant); as url) { <img [src]="url" [alt]="item.variant.name"> }
                  @else { <div class="image-placeholder"><strong>{{ item.variant.name }}</strong></div> }
                </a>
                <button class="favorite-button active" (click)="remove(item.variant.id)" aria-label="Quitar de favoritos">♥</button>
              </div>
              <div class="variant-card-body">
                <small>{{ item.product.name }}</small><h2>{{ item.variant.name }}</h2>
                <p>{{ item.variant.weight_grams }} g</p>
                <strong>{{ price(item.variant) / 100 | currency:'PEN':'symbol':'1.2-2' }}</strong>
                @if (item.variant.stock > 0) { <ion-button expand="block" (click)="add(item.product, item.variant)">Agregar</ion-button> }
                @else { <b class="sold-out-label">Agotado</b> }
              </div>
            </article>
          } @empty {
            <section class="empty-state"><h2>Aún no tienes favoritos</h2><p>Toca el corazón de una presentación para guardarla aquí.</p><ion-button routerLink="/catalog">Explorar catálogo</ion-button></section>
          }
        </section>
      }
      @if (message()) { <p class="success-message">{{ message() }}</p> }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class FavoritesPage {
  private readonly api = inject(ApiService);
  private readonly cart = inject(CartService);
  readonly favorites = inject(FavoritesService);
  readonly products = signal<Product[]>([]);
  readonly loading = signal(true);
  readonly message = signal('');
  readonly items = computed(() => this.products().flatMap(product =>
    product.variants.filter(variant => this.favorites.has(variant.id)).map(variant => ({ product, variant }))));

  constructor() {
    void this.favorites.synchronize().catch(() => undefined);
    this.api.products().pipe(finalize(() => this.loading.set(false))).subscribe({
      next: response => this.products.set(response.data),
    });
  }

  async remove(variantId: number): Promise<void> { await this.favorites.toggle(variantId); }
  add(product: Product, variant: ProductVariant): void {
    this.cart.add({ variantId: variant.id, name: `${product.name} — ${variant.name}`, priceAmount: this.price(variant), quantity: 1, stock: variant.stock, imageUrl: this.image(product, variant) });
    this.message.set(`${variant.name} se agregó al carrito.`);
  }
  image(product: Product, variant: ProductVariant): string | null {
    return publicAssetUrl(variant.image?.path ?? product.images.find(image => image.is_primary && !image.product_variant_id)?.path);
  }
  price(variant: ProductVariant): number { return variant.promotional_price_amount ?? variant.price_amount; }
}
