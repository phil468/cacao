import { Component, inject, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { IonButton, IonContent, IonHeader, IonInput, IonItem, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { ApiService } from '../../core/api.service';
import { AuthService } from '../../core/auth.service';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [FormsModule, RouterLink, IonButton, IonContent, IonHeader, IonInput, IonItem, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Crear cuenta</ion-title></ion-toolbar></ion-header>
    <ion-content>
      <form class="mobile-form" (ngSubmit)="submit()">
        <ion-item><ion-input label="Nombre completo" labelPlacement="stacked" name="name" [(ngModel)]="name" required minlength="3" /></ion-item>
        <ion-item><ion-input label="Correo electrónico" labelPlacement="stacked" type="email" name="email" [(ngModel)]="email" required /></ion-item>
        <ion-item><ion-input label="Teléfono" labelPlacement="stacked" type="tel" name="phone" [(ngModel)]="phone" required /></ion-item>
        <ion-item><ion-input label="Contraseña" labelPlacement="stacked" type="password" name="password" [(ngModel)]="password" required minlength="10" /></ion-item>
        <ion-item><ion-input label="Confirmar contraseña" labelPlacement="stacked" type="password" name="confirmation" [(ngModel)]="confirmation" required /></ion-item>
        @if (error()) { <p class="form-error" role="alert">{{ error() }}</p> }
        <ion-button expand="block" type="submit" [disabled]="loading()">{{ loading() ? 'Creando cuenta…' : 'Crear cuenta' }}</ion-button>
        <ion-button expand="block" fill="clear" routerLink="/login">Ya tengo una cuenta</ion-button>
      </form>
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class RegisterPage {
  private readonly api = inject(ApiService);
  private readonly auth = inject(AuthService);
  private readonly router = inject(Router);
  name = '';
  email = '';
  phone = '';
  password = '';
  confirmation = '';
  readonly loading = signal(false);
  readonly error = signal('');

  submit(): void {
    if (this.password !== this.confirmation) {
      this.error.set('Las contraseñas no coinciden.');
      return;
    }
    this.loading.set(true);
    this.error.set('');
    this.api.register({
      name: this.name,
      email: this.email,
      phone: this.phone,
      password: this.password,
      password_confirmation: this.confirmation,
    }).subscribe({
      next: response => {
        this.auth.startSession(response.token, response.user);
        void this.router.navigateByUrl('/addresses');
      },
      error: error => {
        this.error.set(error.message);
        this.loading.set(false);
      },
    });
  }
}
