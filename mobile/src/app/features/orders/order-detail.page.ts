import { DatePipe } from '@angular/common';
import { Component, inject, signal } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { IonContent, IonHeader, IonItem, IonLabel, IonList, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { ApiService } from '../../core/api.service';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [DatePipe, IonContent, IonHeader, IonItem, IonLabel, IonList, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `<ion-header><ion-toolbar><ion-title>Detalle del pedido</ion-title></ion-toolbar></ion-header><ion-content>
    @if (order(); as item) {
      <h1>{{ item.status.name }}</h1><p>Pedido {{ item.number }}</p><p>Total: S/ {{ (item.total_amount / 100).toFixed(2) }}</p>
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
