import { Component, inject, signal } from '@angular/core';
import { RouterLink } from '@angular/router';
import { IonButton, IonContent, IonHeader, IonItem, IonLabel, IonList, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { ApiService } from '../../core/api.service';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [RouterLink, IonButton, IonContent, IonHeader, IonItem, IonLabel, IonList, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Mis direcciones</ion-title></ion-toolbar></ion-header>
    <ion-content>
      @if (!authenticated()) {
        <section class="empty-state"><p>Ingresa para gestionar tus direcciones.</p><ion-button routerLink="/login">Ingresar</ion-button></section>
      } @else {
        <ion-list>@for (address of addresses(); track address.id) {
          <ion-item><ion-label><h2>{{ address.label }}</h2><p>{{ address.line_one }}</p><p>{{ address.district }}, {{ address.province }}</p></ion-label></ion-item>
        } @empty { <section class="empty-state"><p>Aún no tienes direcciones registradas.</p></section> }</ion-list>
      }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class AddressesPage {
  private readonly api = inject(ApiService);
  readonly authenticated = signal(Boolean(localStorage.getItem('auth_token')));
  readonly addresses = signal<any[]>([]);

  constructor() {
    if (this.authenticated()) {
      this.api.addresses().subscribe(response => this.addresses.set(response.data));
    }
  }
}
