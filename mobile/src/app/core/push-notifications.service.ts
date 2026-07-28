import { inject, Injectable, signal } from '@angular/core';
import { Router } from '@angular/router';
import { Capacitor } from '@capacitor/core';
import { PushNotifications } from '@capacitor/push-notifications';
import { ApiService } from './api.service';

export interface PushPreferences {
  orderUpdates: boolean;
  promotions: boolean;
}

@Injectable({ providedIn: 'root' })
export class PushNotificationsService {
  private readonly api = inject(ApiService);
  private readonly router = inject(Router);
  private readonly preferencesKey = 'push_preferences';
  private preferences: PushPreferences = this.readPreferences();
  private listenersReady = false;
  readonly supported = Capacitor.isNativePlatform();
  readonly status = signal<'idle' | 'registering' | 'enabled' | 'denied' | 'error'>('idle');

  async initialize(): Promise<void> {
    if (this.supported) await this.addListeners();
  }

  async enable(preferences: PushPreferences): Promise<void> {
    if (!this.supported) {
      this.status.set('error');
      return;
    }

    this.preferences = preferences;
    localStorage.setItem(this.preferencesKey, JSON.stringify(preferences));
    this.status.set('registering');
    await this.addListeners();
    let permission = await PushNotifications.checkPermissions();
    if (permission.receive === 'prompt' || permission.receive === 'prompt-with-rationale') {
      permission = await PushNotifications.requestPermissions();
    }
    if (permission.receive !== 'granted') {
      this.status.set('denied');
      return;
    }

    await PushNotifications.createChannel({
      id: 'orders',
      name: 'Actualizaciones de pedidos',
      description: 'Cambios de estado y entrega de tus pedidos.',
      importance: 4,
      vibration: true,
    });
    await PushNotifications.createChannel({
      id: 'promotions',
      name: 'Promociones',
      description: 'Novedades y promociones de Cacao del Perú.',
      importance: 3,
    });
    await PushNotifications.register();
  }

  private async addListeners(): Promise<void> {
    if (this.listenersReady) return;
    this.listenersReady = true;

    await PushNotifications.addListener('registration', token => {
      this.api.registerPushDevice(token.value, Capacitor.getPlatform(), this.preferences).subscribe({
        next: () => this.status.set('enabled'),
        error: () => this.status.set('error'),
      });
    });
    await PushNotifications.addListener('registrationError', () => this.status.set('error'));
    await PushNotifications.addListener('pushNotificationActionPerformed', event => {
      const route = event.notification.data?.['route'];
      if (typeof route === 'string' && /^\/(orders|catalog|product\/)/.test(route)) {
        void this.router.navigateByUrl(route);
      }
    });
  }

  private readPreferences(): PushPreferences {
    try {
      return JSON.parse(localStorage.getItem(this.preferencesKey) ?? '{"orderUpdates":true,"promotions":false}') as PushPreferences;
    } catch {
      return { orderUpdates: true, promotions: false };
    }
  }
}
