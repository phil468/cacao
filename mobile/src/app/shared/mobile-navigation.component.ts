import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { IonButton, IonButtons, IonFooter, IonToolbar } from '@ionic/angular/standalone';

@Component({
  selector: 'app-mobile-navigation',
  standalone: true,
  imports: [RouterLink, RouterLinkActive, IonButton, IonButtons, IonFooter, IonToolbar],
  template: `
    <ion-footer>
      <ion-toolbar>
        <ion-buttons class="mobile-navigation">
          <ion-button routerLink="/" routerLinkActive="active" [routerLinkActiveOptions]="{ exact: true }">Inicio</ion-button>
          <ion-button routerLink="/catalog" routerLinkActive="active">Catálogo</ion-button>
          <ion-button routerLink="/cart" routerLinkActive="active">Carrito</ion-button>
          <ion-button routerLink="/orders" routerLinkActive="active">Pedidos</ion-button>
          <ion-button routerLink="/addresses" routerLinkActive="active">Direcciones</ion-button>
          <ion-button routerLink="/notifications" routerLinkActive="active">Avisos</ion-button>
        </ion-buttons>
      </ion-toolbar>
    </ion-footer>
  `,
})
export class MobileNavigationComponent {}
