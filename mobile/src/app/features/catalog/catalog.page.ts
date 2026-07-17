import { Component, inject, signal } from '@angular/core';
import { RouterLink } from '@angular/router';
import { IonContent, IonHeader, IonItem, IonLabel, IonList, IonSearchbar, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { ApiService } from '../../core/api.service';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [RouterLink, IonContent, IonHeader, IonToolbar, IonTitle, IonSearchbar, IonList, IonItem, IonLabel, MobileNavigationComponent],
  template: `<ion-header><ion-toolbar><ion-title>Catálogo</ion-title></ion-toolbar></ion-header>
    <ion-content><ion-searchbar placeholder="Buscar chocolate" (ionInput)="search($event.detail.value ?? '')" />
    <ion-list>@for (product of products(); track product.id) {
      <ion-item [routerLink]="['/product', product.slug]"><ion-label><h2>{{ product.name }}</h2>
      <p>{{ product.short_description }}</p><span class="price">S/ {{ price(product) }}</span></ion-label></ion-item>
    }</ion-list></ion-content><app-mobile-navigation />`,
})
export class CatalogPage {
  private readonly api = inject(ApiService);
  readonly products = signal<any[]>([]);
  constructor() { this.load(); }
  search(query: string) { this.load(query); }
  price(product: any): string { const variant = product.variants[0]; return ((variant?.promotional_price_amount ?? variant?.price_amount ?? 0) / 100).toFixed(2); }
  private load(query = '') { this.api.products(query ? { search: query } : {}).subscribe(response => this.products.set(response.data)); }
}
