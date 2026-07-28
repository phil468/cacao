import { CurrencyPipe } from '@angular/common';
import { Component, inject, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { IonButton, IonCheckbox, IonContent, IonHeader, IonInput, IonItem, IonLabel, IonList, IonSelect, IonSelectOption, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { forkJoin } from 'rxjs';
import { ApiService } from '../../core/api.service';
import { AuthService } from '../../core/auth.service';
import { CartService } from '../../core/cart.service';
import { Address } from '../../core/models';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

@Component({
  standalone: true,
  imports: [CurrencyPipe, FormsModule, RouterLink, IonButton, IonCheckbox, IonContent, IonHeader, IonInput, IonItem, IonLabel, IonList, IonSelect, IonSelectOption, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Finalizar compra</ion-title></ion-toolbar></ion-header>
    <ion-content>
      @if (cart.items().length === 0) {
        <section class="empty-state"><p>Tu carrito está vacío.</p><ion-button routerLink="/catalog">Ver catálogo</ion-button></section>
      } @else if (loading()) {
        <p class="loading-state">Preparando tu compra…</p>
      } @else {
        <h2>Dirección de entrega</h2>
        <ion-list>@for (address of addresses(); track address.id) {
          <ion-item button (click)="selectAddress(address)" [class.selected-address]="selectedAddress()?.id === address.id">
            <ion-label><h3>{{ address.label }}</h3><p>{{ address.line_one }}, {{ address.district }}</p></ion-label>
          </ion-item>
        } @empty { <section class="empty-state"><p>Necesitas registrar una dirección.</p><ion-button routerLink="/addresses">Gestionar direcciones</ion-button></section> }</ion-list>

        <ion-item><ion-select label="Método de pago" labelPlacement="stacked" [(ngModel)]="paymentMethodId" (ionChange)="paymentProof = null">
          @for (method of paymentMethods(); track method.id) { <ion-select-option [value]="method.id">{{ method.name }}</ion-select-option> }
        </ion-select></ion-item>
        @if (selectedPaymentMethod(); as method) {
          <section class="payment-instructions"><p>{{ method.instructions }}</p>
            @if (method.image_url) { <img [src]="method.image_url" [alt]="'Datos para pagar con ' + method.name" /> }
          </section>
        }

        <ion-item><ion-input label="Cupón" labelPlacement="stacked" [(ngModel)]="couponCode" placeholder="Código opcional" /></ion-item>
        <ion-button fill="outline" (click)="quote()" [disabled]="!selectedAddress() || quoting()">{{ quoting() ? 'Calculando…' : 'Aplicar cupón y calcular' }}</ion-button>

        @if (selectedPaymentMethod()?.requires_proof) {
          <label class="file-field"><strong>Constancia de pago *</strong><span>Adjunta una imagen JPG, PNG o un PDF de hasta 5 MB.</span>
            <input type="file" accept="image/jpeg,image/png,application/pdf" (change)="selectProof($event)" required />
          </label>
        }
        <ion-item><ion-checkbox [(ngModel)]="whatsAppOptIn">Recibir actualizaciones de este pedido por WhatsApp</ion-checkbox></ion-item>

        @if (quoteData(); as totals) {
          <section class="checkout-summary">
            <p>Subtotal <b>{{ totals.subtotal_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</b></p>
            <p>Descuento <b>-{{ totals.discount_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</b></p>
            <p>Envío <b>{{ totals.delivery_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</b></p>
            <p>Total <b>{{ totals.total_amount / 100 | currency:'PEN':'symbol':'1.2-2' }}</b></p>
          </section>
        }
        @if (error()) { <p class="form-error" role="alert">{{ error() }}</p> }
        <ion-button expand="block" (click)="createOrder()" [disabled]="submitting() || !quoteData() || !selectedAddress()">
          {{ submitting() ? 'Creando pedido…' : 'Crear pedido' }}
        </ion-button>
      }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class CheckoutPage {
  private readonly api = inject(ApiService);
  private readonly router = inject(Router);
  readonly auth = inject(AuthService);
  readonly cart = inject(CartService);
  readonly addresses = signal<Address[]>([]);
  readonly paymentMethods = signal<any[]>([]);
  readonly selectedAddress = signal<Address | null>(null);
  readonly quoteData = signal<any | null>(null);
  readonly error = signal('');
  readonly loading = signal(true);
  readonly quoting = signal(false);
  readonly submitting = signal(false);
  paymentMethodId: number | null = null;
  couponCode = '';
  whatsAppOptIn = false;
  paymentProof: File | null = null;

  constructor() {
    if (!this.cart.items().length) {
      this.loading.set(false);
      return;
    }
    forkJoin({ addresses: this.api.addresses(), options: this.api.commerceOptions() }).subscribe({
      next: ({ addresses, options }) => {
        this.addresses.set(addresses.data);
        this.selectedAddress.set(addresses.data.find(address => address.is_default) ?? addresses.data[0] ?? null);
        this.paymentMethods.set(options.data.payment_methods);
        this.paymentMethodId = options.data.payment_methods[0]?.id ?? null;
        this.loading.set(false);
        this.quote();
      },
      error: error => { this.error.set(error.message); this.loading.set(false); },
    });
  }

  selectedPaymentMethod(): any | null { return this.paymentMethods().find(method => method.id === this.paymentMethodId) ?? null; }
  selectAddress(address: Address): void { this.selectedAddress.set(address); this.quote(); }
  selectProof(event: Event): void { this.paymentProof = (event.target as HTMLInputElement).files?.[0] ?? null; }
  private items(): Array<{ variant_id: number; quantity: number }> { return this.cart.items().map(item => ({ variant_id: item.variantId, quantity: item.quantity })); }

  quote(): void {
    const address = this.selectedAddress();
    if (!address) {
      this.error.set('Selecciona o registra una dirección de entrega.');
      return;
    }
    this.quoting.set(true);
    this.error.set('');
    this.api.checkoutQuote({ items: this.items(), district: address.district, coupon_code: this.couponCode.trim() || null }).subscribe({
      next: response => { this.quoteData.set(response.data); this.quoting.set(false); },
      error: error => { this.quoteData.set(null); this.error.set(error.message); this.quoting.set(false); },
    });
  }

  createOrder(): void {
    const address = this.selectedAddress();
    const quote = this.quoteData();
    const method = this.selectedPaymentMethod();
    if (!address) { this.error.set('Selecciona una dirección de entrega.'); return; }
    if (!method) { this.error.set('Selecciona un método de pago.'); return; }
    if (!quote) { this.error.set('Calcula el total antes de crear el pedido.'); return; }
    if (method.requires_proof && !this.paymentProof) { this.error.set('Debes adjuntar una constancia de pago.'); return; }

    const data = new FormData();
    this.items().forEach((item, index) => {
      data.append(`items[${index}][variant_id]`, String(item.variant_id));
      data.append(`items[${index}][quantity]`, String(item.quantity));
    });
    (['recipient_name', 'phone', 'line_one', 'district', 'province', 'department'] as const).forEach(key => data.append(`address[${key}]`, String(address[key] ?? '')));
    data.append('payment_method_id', String(method.id));
    data.append('delivery_rate_id', String(quote.delivery_rate_id));
    if (this.couponCode.trim()) data.append('coupon_code', this.couponCode.trim());
    data.append('whatsapp_updates_opt_in', this.whatsAppOptIn ? '1' : '0');
    if (this.paymentProof) data.append('payment_proof', this.paymentProof);

    this.submitting.set(true);
    this.error.set('');
    this.api.checkout(data).subscribe({
      next: response => {
        this.cart.clear();
        void this.router.navigate(['/orders', response.data.id], { queryParams: { created: 1 } });
      },
      error: error => { this.error.set(error.message); this.submitting.set(false); },
    });
  }
}
