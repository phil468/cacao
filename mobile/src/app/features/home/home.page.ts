import { Component, inject, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { IonButton, IonContent, IonSearchbar } from '@ionic/angular/standalone';
import { ApiService } from '../../core/api.service';
import { AddressPreferenceService } from '../../core/address-preference.service';
import { Product, publicAssetUrl } from '../../core/models';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [FormsModule, RouterLink, IonButton, IonContent, IonSearchbar, MobileNavigationComponent],
  template: `
    <ion-content>
      <header class="home-header">
        <img src="assets/brand/cacao-del-peru-logo.png" alt="Cacao del Perú">
        <a class="address-selector" routerLink="/addresses">
          <small>ENVIAR A</small>
          <strong>{{ address.label() }}⌄</strong>
        </a>
        <a class="header-cart" routerLink="/cart" aria-label="Abrir carrito">▢</a>
      </header>

      <section class="home-search">
        <ion-searchbar [(ngModel)]="search" placeholder="¿Qué chocolate estás buscando?" (keyup.enter)="searchCatalog()" />
      </section>

      <section class="home-hero">
        <small>EDICIÓN SELECTA · CACAO PERUANO</small>
        <h1>El lujo también tiene origen.</h1>
        <p>Chocolate de carácter profundo y sabores que celebran la riqueza del Perú.</p>
        <ion-button routerLink="/catalog">Descubrir el catálogo</ion-button>
      </section>

      <section class="home-section">
        <div class="section-heading"><div><small>EXPLORA</small><h2>Colecciones</h2></div><a routerLink="/catalog">Ver todo</a></div>
        <div class="category-scroller">
          @for (category of categories(); track category.slug) {
            <a [routerLink]="['/catalog']" [queryParams]="{ category: category.slug }">
              <span>{{ category.mark }}</span><b>{{ category.name }}</b>
            </a>
          }
        </div>
      </section>

      <section class="home-section">
        <div class="section-heading"><div><small>SELECCIÓN DE LA CASA</small><h2>Productos destacados</h2></div><a routerLink="/catalog">Ver todos</a></div>
        <div class="featured-grid">
          @for (product of featured(); track product.id) {
            <a class="featured-card" [routerLink]="['/product', product.slug]">
              @if (image(product); as imageUrl) { <img [src]="imageUrl" [alt]="product.name"> }
              <div><small>{{ product.category?.name || 'Selección peruana' }}</small><h3>{{ product.name }}</h3><b>Desde S/ {{ price(product) }}</b></div>
            </a>
          } @empty {
            <p>Estamos preparando una selección especial para ti.</p>
          }
        </div>
      </section>
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class HomePage {
  private readonly api = inject(ApiService);
  private readonly router = inject(Router);
  readonly address = inject(AddressPreferenceService);
  readonly featured = signal<Product[]>([]);
  readonly categories = signal([
    { name: 'Chocolate 60%', slug: 'chocolates', mark: '60%' },
    { name: 'Chocolate 70%', slug: 'chocolates', mark: '70%' },
    { name: 'Premium', slug: 'chocolates', mark: '◆' },
    { name: 'Grageas', slug: 'grageas', mark: '●' },
    { name: 'Cacao y café', slug: 'otros-productos', mark: '☕' },
  ]);
  search = '';

  constructor() {
    this.api.products({ featured: '1', available: '1' }).subscribe({
      next: response => this.featured.set(response.data.slice(0, 6)),
    });
  }

  searchCatalog(): void {
    const query = this.search.trim();
    void this.router.navigate(['/catalog'], { queryParams: query ? { search: query } : {} });
  }

  image(product: Product): string | null {
    return publicAssetUrl(product.images.find(image => image.is_primary && !image.product_variant_id)?.path);
  }

  price(product: Product): string {
    const prices = product.variants.filter(item => item.stock > 0).map(item => item.promotional_price_amount ?? item.price_amount);
    return (Math.min(...(prices.length ? prices : [0])) / 100).toFixed(2);
  }
}
