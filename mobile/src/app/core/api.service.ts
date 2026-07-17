import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { environment } from '../../environments/environment';

@Injectable({ providedIn: 'root' })
export class ApiService {
  private readonly http = inject(HttpClient);

  products(params: Record<string, string> = {}) { return this.http.get<any>(`${environment.apiUrl}/products`, { params }); }
  product(slug: string) { return this.http.get<any>(`${environment.apiUrl}/products/${slug}`); }
  login(email: string, password: string) { return this.http.post<any>(`${environment.apiUrl}/auth/login`, { email, password, device_name: 'Cacao del Perú' }); }
  addresses() { return this.http.get<any>(`${environment.apiUrl}/addresses`); }
  commerceOptions() { return this.http.get<any>(`${environment.apiUrl}/commerce-options`); }
  checkoutQuote(body: unknown) { return this.http.post<any>(`${environment.apiUrl}/checkout/quote`, body); }
  registerPushDevice(token: string, platform: string, preferences: { orderUpdates: boolean; promotions: boolean }) {
    return this.http.post(`${environment.apiUrl}/push-devices`, {
      token,
      platform,
      order_updates_enabled: preferences.orderUpdates,
      promotions_enabled: preferences.promotions,
    });
  }
  orders() { return this.http.get<any>(`${environment.apiUrl}/orders`); }
  order(id: string) { return this.http.get<any>(`${environment.apiUrl}/orders/${id}`); }
  checkout(body: FormData) { return this.http.post<any>(`${environment.apiUrl}/checkout`, body); }
}
