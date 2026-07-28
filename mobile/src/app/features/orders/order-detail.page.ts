import { CurrencyPipe, DatePipe } from '@angular/common';
import { Component, inject, signal } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { IonContent, IonHeader, IonItem, IonLabel, IonList, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { ApiService } from '../../core/api.service';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [CurrencyPipe, DatePipe, IonContent, IonHeader, IonItem, IonLabel, IonList, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `<ion-header><ion-toolbar><ion-title>Detalle del pedido</ion-title></ion-toolbar></ion-header><ion-content>
    @if (order(); as item) {
      <h1 class="product-title">{{ item.status.name }}</h1><p>Pedido {{ item.number }}</p>
      <section class="checkout-summary">
        <p>Subtotal <b>{{ item.subtotal_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</b></p>
        <p>Descuento <b>-{{ item.discount_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</b></p>
        <p>Envío <b>{{ item.delivery_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</b></p>
        <p>Total <b>{{ item.total_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</b></p>
      </section>
      <h2>Productos</h2><ion-list>@for (line of item.items; track line.id) {
        <ion-item><ion-label><h3>{{ line.product_name }} — {{ line.variant_name }}</h3><p>{{ line.quantity }} × {{ line.unit_price_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</p></ion-label></ion-item>
      }</ion-list>
      <h2>Seguimiento</h2><ion-list>@for (history of item.status_history; track history.created_at) {
        <ion-item><ion-label><h3>{{ history.status.name }}</h3><p>{{ history.note }}</p><small>{{ history.created_at | date:'dd/MM/yyyy HH:mm' }}</small></ion-label></ion-item>
      }</ion-list>
    }
  </ion-content><app-mobile-navigation />`,
})
export class OrderDetailPage {
  readonly order = signal<any | null>(null);
  constructor() {
    const id = inject(ActivatedRoute).snapshot.paramMap.get('id')!;
    inject(ApiService).order(id).subscribe(response => this.order.set(response.data));
  }
}
