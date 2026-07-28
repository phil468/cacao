import { CurrencyPipe } from '@angular/common';
import { Component, inject, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { IonButton, IonContent, IonHeader, IonInput, IonItem, IonLabel, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { ApiService } from '../../core/api.service';
import { CartService } from '../../core/cart.service';
import { Product, ProductVariant, publicAssetUrl } from '../../core/models';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [CurrencyPipe, FormsModule, IonButton, IonContent, IonHeader, IonInput, IonItem, IonLabel, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Detalle</ion-title></ion-toolbar></ion-header>
    <ion-content>
      @if (loading()) {
        <p class="loading-state">Cargando producto…</p>
      } @else if (error()) {
        <p class="form-error">{{ error() }}</p>
      } @else if (product(); as product) {
        @if (image(product); as url) { <img class="product-hero-image" [src]="url" [alt]="product.name" /> }
        <h1 class="product-title">{{ product.name }}</h1>
        <p>{{ product.description }}</p>
        <h2>Elige sabores y cantidades</h2>
        @for (variant of product.variants; track variant.id) {
          <ion-item class="variant-row" [class.sold-out]="variant.stock < 1">
            <ion-label>
              <h3>{{ variant.name }}</h3>
              <p>{{ details(variant) }} · {{ variant.stock > 0 ? variant.stock + ' disponibles' : 'Agotado' }}</p>
              <strong>{{ price(variant) / 100 | currency:'PEN':'symbol':'1.2-2' }}</strong>
            </ion-label>
            @if (variant.stock > 0) {
              <ion-input class="quantity-input" type="number" min="1" [max]="variant.stock" [(ngModel)]="quantities[variant.id]" aria-label="Cantidad" />
              <ion-button (click)="add(product, variant)">Agregar</ion-button>
            }
          </ion-item>
        }
        @if (message()) { <p class="success-message" role="status">{{ message() }}</p> }
      }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class ProductPage {
  private readonly api = inject(ApiService);
  private readonly route = inject(ActivatedRoute);
  private readonly cart = inject(CartService);
  readonly product = signal<Product | null>(null);
  readonly loading = signal(true);
  readonly error = signal('');
  readonly message = signal('');
  quantities: Record<number, number> = {};

  constructor() {
    const slug = this.route.snapshot.paramMap.get('slug')!;
    this.api.product(slug).subscribe({
      next: response => { this.product.set(response.data); this.loading.set(false); },
      error: error => { this.error.set(error.message); this.loading.set(false); },
    });
  }

  add(product: Product, variant: ProductVariant): void {
    const quantity = Math.max(1, Math.min(Number(this.quantities[variant.id] ?? 1), variant.stock));
    this.cart.add({
      variantId: variant.id,
      name: `${product.name} — ${variant.name}`,
      priceAmount: this.price(variant),
      quantity,
      stock: variant.stock,
      imageUrl: this.image(product),
    });
    this.quantities[variant.id] = 1;
    this.message.set(`${variant.name} se agregó al carrito. Puedes seguir comprando.`);
  }

  price(variant: ProductVariant): number { return variant.promotional_price_amount ?? variant.price_amount; }
  image(product: Product): string | null { return publicAssetUrl(product.images.find(image => image.is_primary)?.path); }
  details(variant: ProductVariant): string {
    return [variant.cacao_percentage ? `${variant.cacao_percentage}% cacao` : null, variant.weight_grams ? `${variant.weight_grams} g` : null].filter(Boolean).join(' · ');
  }
}
