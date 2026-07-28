import { Component, inject } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { IonButton, IonContent, IonHeader, IonItem, IonLabel, IonList, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { ApiService } from '../../core/api.service';
import { AuthService } from '../../core/auth.service';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [RouterLink, IonButton, IonContent, IonHeader, IonItem, IonLabel, IonList, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Mi cuenta</ion-title></ion-toolbar></ion-header>
    <ion-content>
      <section class="profile-heading">
        <div class="profile-avatar">{{ initial() }}</div>
        <div>
          <small>TU ESPACIO CACAO</small>
          <h1>{{ auth.user()?.name || 'Hola' }}</h1>
          <p>{{ auth.user()?.email || 'Ingresa para sincronizar tus compras y favoritos.' }}</p>
        </div>
      </section>
      <ion-list class="account-menu">
        @if (!auth.authenticated()) {
          <ion-item detail routerLink="/login"><ion-label><h2>Ingresar</h2><p>Accede a pedidos y direcciones</p></ion-label></ion-item>
          <ion-item detail routerLink="/register"><ion-label><h2>Crear una cuenta</h2><p>Compra más rápido la próxima vez</p></ion-label></ion-item>
        }
        <ion-item detail routerLink="/orders"><ion-label><h2>Mis pedidos</h2><p>Consulta el seguimiento y vuelve a pedir</p></ion-label></ion-item>
        <ion-item detail routerLink="/addresses"><ion-label><h2>Direcciones</h2><p>Gestiona tus lugares de entrega</p></ion-label></ion-item>
        <ion-item detail routerLink="/favorites"><ion-label><h2>Favoritos</h2><p>Encuentra rápidamente tus chocolates preferidos</p></ion-label></ion-item>
        <ion-item detail routerLink="/notifications"><ion-label><h2>Notificaciones</h2><p>Estados de pedidos y promociones</p></ion-label></ion-item>
      </ion-list>
      @if (auth.authenticated()) {
        <ion-button expand="block" fill="outline" class="logout-button" (click)="logout()">Cerrar sesión</ion-button>
      }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class ProfilePage {
  readonly auth = inject(AuthService);
  private readonly api = inject(ApiService);
  private readonly router = inject(Router);

  initial(): string { return this.auth.user()?.name?.trim().charAt(0).toUpperCase() || 'C'; }
  logout(): void {
    this.api.logout().subscribe({ complete: () => this.finish(), error: () => this.finish() });
  }
  private finish(): void {
    this.auth.endSession();
    void this.router.navigateByUrl('/');
  }
}
