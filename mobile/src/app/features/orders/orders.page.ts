import { CurrencyPipe, DatePipe } from '@angular/common';
import { Component, computed, inject, signal } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { IonButton, IonContent, IonHeader, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { forkJoin } from 'rxjs';
import { ApiService } from '../../core/api.service';
import { CartService } from '../../core/cart.service';
import { Product } from '../../core/models';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

type OrderFilter = 'active' | 'delivered' | 'cancelled';

@Component({
  standalone: true,
  imports: [CurrencyPipe, DatePipe, RouterLink, IonButton, IonContent, IonHeader, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Mis pedidos</ion-title></ion-toolbar></ion-header>
    <ion-content>
      <nav class="order-filter-tabs" aria-label="Filtrar pedidos">
        <button [class.active]="filter() === 'active'" (click)="filter.set('active')">Activos</button>
        <button [class.active]="filter() === 'delivered'" (click)="filter.set('delivered')">Entregados</button>
        <button [class.active]="filter() === 'cancelled'" (click)="filter.set('cancelled')">Cancelados</button>
      </nav>
      @if (loading()) {
        <p class="loading-state">Cargando pedidos…</p>
      } @else if (error()) {
        <section class="empty-state"><p class="form-error">{{ error() }}</p><ion-button (click)="load()">Reintentar</ion-button></section>
      } @else {
        <section class="orders-list">
          @for (order of filteredOrders(); track order.id) {
            <article class="order-card">
              <a [routerLink]="['/orders', order.id]">
                <div><small>{{ order.created_at | date:'dd MMM yyyy' }}</small><h2>{{ order.status.name }}</h2><p>{{ itemCount(order) }} producto(s) · Pedido {{ shortNumber(order.number) }}</p></div>
                <strong>{{ order.total_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</strong>
              </a>
              <div class="order-card-actions">
                <ion-button fill="clear" [routerLink]="['/orders', order.id]">Ver detalle</ion-button>
                @if (order.status.code === 'delivered' || order.status.code === 'cancelled') {
                  <ion-button fill="outline" (click)="reorder(order)">Volver a pedir</ion-button>
                }
              </div>
            </article>
          } @empty {
            <section class="empty-state"><h2>No hay pedidos en esta sección</h2><ion-button routerLink="/catalog">Explorar catálogo</ion-button></section>
          }
        </section>
      }
      @if (message()) { <p class="success-message">{{ message() }}</p> }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class OrdersPage {
  private readonly api = inject(ApiService);
  private readonly cart = inject(CartService);
  private readonly router = inject(Router);
  readonly orders = signal<any[]>([]);
  readonly filter = signal<OrderFilter>('active');
  readonly loading = signal(true);
  readonly error = signal('');
  readonly message = signal('');
  readonly filteredOrders = computed(() => this.orders().filter(order => {
    if (this.filter() === 'active') return !['delivered', 'cancelled'].includes(order.status.code);
    return order.status.code === this.filter();
  }));

  constructor() { this.load(); }

  load(): void {
    this.loading.set(true);
    this.api.orders().subscribe({
      next: response => { this.orders.set(response.data); this.loading.set(false); },
      error: error => { this.error.set(error.message); this.loading.set(false); },
    });
  }

  reorder(order: any): void {
    this.message.set('Validando precios y disponibilidad…');
    forkJoin({ products: this.api.products(), detail: this.api.order(String(order.id)) }).subscribe({
      next: ({ products, detail }) => {
        const variants = this.variantIndex(products.data);
        let restored = 0;
        let omitted = 0;
        for (const line of detail.data.items ?? []) {
          const match = variants.get(Number(line.product_variant_id));
          if (!match || match.variant.stock < 1) { omitted++; continue; }
          const quantity = Math.min(Number(line.quantity), match.variant.stock);
          this.cart.add({
            variantId: match.variant.id,
            name: `${match.product.name} — ${match.variant.name}`,
            priceAmount: match.variant.promotional_price_amount ?? match.variant.price_amount,
            quantity,
            stock: match.variant.stock,
            imageUrl: null,
          });
          restored += quantity;
        }
        this.message.set(omitted ? `${restored} unidades agregadas; ${omitted} presentaciones ya no están disponibles.` : 'El pedido se agregó al carrito con precios actuales.');
        if (restored) void this.router.navigateByUrl('/cart');
      },
      error: error => this.error.set(error.message),
    });
  }

  itemCount(order: any): number { return (order.items ?? []).reduce((total: number, item: any) => total + Number(item.quantity), 0); }
  shortNumber(number: string): string { return number.slice(0, 8).toUpperCase(); }
  private variantIndex(products: Product[]): Map<number, { product: Product; variant: Product['variants'][number] }> {
    return new Map(products.flatMap(product => product.variants.map(variant => [variant.id, { product, variant }] as const)));
  }
}
