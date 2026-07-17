import { Component, inject, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { IonButton, IonContent, IonHeader, IonItem, IonTitle, IonToggle, IonToolbar } from '@ionic/angular/standalone';
import { PushNotificationsService } from '../../core/push-notifications.service';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [FormsModule, IonButton, IonContent, IonHeader, IonItem, IonTitle, IonToggle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Notificaciones</ion-title></ion-toolbar></ion-header>
    <ion-content>
      <h2>Elige qué deseas recibir</h2>
      <ion-item><ion-toggle [(ngModel)]="orderUpdates">Estado de mis pedidos</ion-toggle></ion-item>
      <ion-item><ion-toggle [(ngModel)]="promotions">Promociones y novedades</ion-toggle></ion-item>
      <p>Las promociones son opcionales y puedes desactivarlas cuando quieras.</p>
      @if (!push.supported) {
        <p class="form-error">Las notificaciones push se prueban en Android o iOS. El navegador de desarrollo no registra un dispositivo.</p>
      }
      <ion-button expand="block" (click)="enable()" [disabled]="!push.supported || push.status() === 'registering'">Activar notificaciones</ion-button>
      @if (message()) { <p>{{ message() }}</p> }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class NotificationPreferencesPage {
  readonly push = inject(PushNotificationsService);
  orderUpdates = true;
  promotions = false;
  readonly message = signal('');

  async enable(): Promise<void> {
    await this.push.enable({ orderUpdates: this.orderUpdates, promotions: this.promotions });
    this.message.set(this.push.status() === 'denied' ? 'Debes permitir las notificaciones desde los ajustes del dispositivo.' : 'Guardando tus preferencias…');
  }
}
