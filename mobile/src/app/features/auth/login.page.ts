import { Component, inject, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { IonButton, IonContent, IonHeader, IonInput, IonItem, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { ApiService } from '../../core/api.service';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [FormsModule, IonButton, IonContent, IonHeader, IonInput, IonItem, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Ingresar</ion-title></ion-toolbar></ion-header>
    <ion-content>
      <form class="mobile-form" (ngSubmit)="submit()">
        <ion-item><ion-input label="Correo electrónico" labelPlacement="stacked" type="email" name="email" [(ngModel)]="email" required /></ion-item>
        <ion-item><ion-input label="Contraseña" labelPlacement="stacked" type="password" name="password" [(ngModel)]="password" required /></ion-item>
        @if (error()) { <p class="form-error">{{ error() }}</p> }
        <ion-button expand="block" type="submit" [disabled]="loading()">{{ loading() ? 'Ingresando…' : 'Ingresar' }}</ion-button>
      </form>
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class LoginPage {
  private readonly api = inject(ApiService);
  private readonly router = inject(Router);
  email = '';
  password = '';
  readonly loading = signal(false);
  readonly error = signal('');

  submit(): void {
    this.loading.set(true);
    this.error.set('');
    this.api.login(this.email, this.password).subscribe({
      next: response => {
        localStorage.setItem('auth_token', response.token);
        void this.router.navigateByUrl('/catalog');
      },
      error: error => {
        this.error.set(error.message);
        this.loading.set(false);
      },
    });
  }
}
