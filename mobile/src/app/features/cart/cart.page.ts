import { CurrencyPipe } from '@angular/common';
import { Component, inject } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterLink } from '@angular/router';
import { IonButton, IonContent, IonHeader, IonInput, IonItem, IonLabel, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { CartService } from '../../core/cart.service';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [CurrencyPipe, FormsModule, RouterLink, IonButton, IonContent, IonHeader, IonInput, IonItem, IonLabel, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Tu carrito</ion-title></ion-toolbar></ion-header>
    <ion-content>
      @for (item of cart.items(); track item.variantId) {
        <ion-item class="cart-row">
          @if (item.imageUrl) { <img class="cart-thumbnail" [src]="item.imageUrl" [alt]="item.name" /> }
          <ion-label><h2>{{ item.name }}</h2><p>{{ item.priceAmount / 100 | currency:'PEN':'symbol':'1.2-2' }} por unidad</p><b>{{ item.priceAmount * item.quantity / 100 | currency:'PEN':'symbol':'1.2-2' }}</b></ion-label>
          <ion-input class="quantity-input" type="number" min="1" [max]="item.stock" [ngModel]="item.quantity" (ngModelChange)="cart.update(item.variantId, +$event)" aria-label="Cantidad" />
          <ion-button fill="clear" color="danger" (click)="cart.remove(item.variantId)">Quitar</ion-button>
        </ion-item>
      } @empty {
        <section class="empty-state"><p>Tu carrito está vacío.</p><ion-button routerLink="/catalog">Explorar catálogo</ion-button></section>
      }
      @if (cart.items().length) {
        <section class="cart-total"><span>Total de productos</span><strong>{{ cart.total() / 100 | currency:'PEN':'symbol':'1.2-2' }}</strong></section>
        <ion-button expand="block" routerLink="/checkout">Continuar al checkout</ion-button>
      }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class CartPage {
  readonly cart = inject(CartService);
}
