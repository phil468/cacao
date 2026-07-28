import { Component, inject } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { IonButton, IonFooter, IonToolbar } from '@ionic/angular/standalone';
import { CartService } from '../core/cart.service';

@Component({
  selector: 'app-mobile-navigation',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, IonButton, IonFooter, IonToolbar],
  template: `
    <ion-footer class="app-tab-bar">
      <ion-toolbar>
        <nav class="mobile-navigation" aria-label="Navegación principal">
          <ion-button fill="clear" routerLink="/" routerLinkActive="active" [routerLinkActiveOptions]="{ exact: true }">
            <span class="tab-icon">⌂</span><span>Inicio</span>
          </ion-button>
          <ion-button fill="clear" routerLink="/catalog" routerLinkActive="active">
            <span class="tab-icon">▦</span><span>Catálogo</span>
          </ion-button>
          <ion-button fill="clear" routerLink="/favorites" routerLinkActive="active">
            <span class="tab-icon">♡</span><span>Favoritos</span>
          </ion-button>
          <ion-button fill="clear" routerLink="/orders" routerLinkActive="active">
            <span class="tab-icon">▤</span><span>Pedidos</span>
          </ion-button>
          <ion-button fill="clear" routerLink="/profile" routerLinkActive="active">
            <span class="tab-icon">○</span><span>Mi cuenta</span>
          </ion-button>
        </nav>
      </ion-toolbar>
      @if (cart.items().length) {
        <a class="cart-dock" routerLink="/cart" aria-label="Abrir carrito">
          <span>Ver carrito</span>
          <b>{{ cartQuantity() }} · S/ {{ (cart.total() / 100).toFixed(2) }}</b>
        </a>
      }
    </ion-footer>
  `,
})
export class MobileNavigationComponent {
  readonly cart = inject(CartService);

  cartQuantity(): number {
    return this.cart.items().reduce((total, item) => total + item.quantity, 0);
  }
}
