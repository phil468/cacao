import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { Address, AddressPayload, ApiCollection, ApiItem, Product, User } from './models';

@Injectable({ providedIn: 'root' })
export class ApiService {
  private readonly http = inject(HttpClient);

  products(params: Record<string, string> = {}) {
    return this.http.get<ApiCollection<Product>>(`${environment.apiUrl}/products`, { params });
  }

  product(slug: string) {
    return this.http.get<ApiItem<Product>>(`${environment.apiUrl}/products/${slug}`);
  }

  login(email: string, password: string) {
    return this.http.post<{ token: string; user: User }>(`${environment.apiUrl}/auth/login`, {
      email,
      password,
      device_name: 'Cacao del Perú',
    });
  }

  register(payload: { name: string; email: string; phone: string; password: string; password_confirmation: string }) {
    return this.http.post<{ token: string; user: User }>(`${environment.apiUrl}/auth/register`, payload);
  }

  logout() { return this.http.post(`${environment.apiUrl}/auth/logout`, {}); }
  addresses() { return this.http.get<ApiCollection<Address>>(`${environment.apiUrl}/addresses`); }
  createAddress(payload: AddressPayload) { return this.http.post<ApiItem<Address>>(`${environment.apiUrl}/addresses`, payload); }
  updateAddress(id: number, payload: AddressPayload) { return this.http.put<ApiItem<Address>>(`${environment.apiUrl}/addresses/${id}`, payload); }
  deleteAddress(id: number) { return this.http.delete(`${environment.apiUrl}/addresses/${id}`); }
  makeDefaultAddress(id: number) { return this.http.patch<ApiItem<Address>>(`${environment.apiUrl}/addresses/${id}/default`, {}); }
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

  removePushDevice(token: string) {
    return this.http.delete(`${environment.apiUrl}/push-devices`, { body: { token } });
  }

  favorites() { return this.http.get<{ data: number[] }>(`${environment.apiUrl}/favorites`); }
  addFavorite(variantId: number) { return this.http.put(`${environment.apiUrl}/favorites/${variantId}`, {}); }
  removeFavorite(variantId: number) { return this.http.delete(`${environment.apiUrl}/favorites/${variantId}`); }
  orders() { return this.http.get<any>(`${environment.apiUrl}/orders`); }
  order(id: string) { return this.http.get<any>(`${environment.apiUrl}/orders/${id}`); }
  checkout(body: FormData) { return this.http.post<any>(`${environment.apiUrl}/checkout`, body); }
}
