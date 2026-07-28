import { Component, inject, signal } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { IonButton, IonCheckbox, IonContent, IonHeader, IonInput, IonItem, IonLabel, IonList, IonSelect, IonSelectOption, IonTextarea, IonTitle, IonToolbar } from '@ionic/angular/standalone';
import { AddressPreferenceService } from '../../core/address-preference.service';
import { ApiService } from '../../core/api.service';
import { Address, AddressPayload } from '../../core/models';
import { MobileNavigationComponent } from '../../shared/mobile-navigation.component';

const districts = ['Ica', 'La Tinguiña', 'Los Aquijes', 'Ocucaje', 'Pachacútec', 'Parcona', 'Pueblo Nuevo', 'Salas', 'San José de los Molinos', 'San Juan Bautista', 'Santiago', 'Subtanjalla', 'Tate', 'Yauca del Rosario'];

@Component({
  standalone: true,
  imports: [FormsModule, IonButton, IonCheckbox, IonContent, IonHeader, IonInput, IonItem, IonLabel, IonList, IonSelect, IonSelectOption, IonTextarea, IonTitle, IonToolbar, MobileNavigationComponent],
  template: `
    <ion-header><ion-toolbar><ion-title>Mis direcciones</ion-title></ion-toolbar></ion-header>
    <ion-content>
      <section class="address-intro"><p>Elige dónde deseas recibir tu pedido. También puedes explorar el catálogo sin seleccionar una dirección.</p></section>
      <ion-button expand="block" fill="outline" (click)="openForm()">{{ editing() ? 'Cancelar edición' : 'Agregar dirección' }}</ion-button>
      @if (editing()) {
        <form class="mobile-form address-form" (ngSubmit)="save()">
          <ion-item><ion-input label="Etiqueta" labelPlacement="stacked" name="label" [(ngModel)]="form.label" placeholder="Casa, oficina…" required /></ion-item>
          <ion-item><ion-input label="Persona que recibe" labelPlacement="stacked" name="recipient" [(ngModel)]="form.recipient_name" required /></ion-item>
          <ion-item><ion-input label="Teléfono" labelPlacement="stacked" type="tel" name="phone" [(ngModel)]="form.phone" required /></ion-item>
          <ion-item><ion-input label="Dirección" labelPlacement="stacked" name="lineOne" [(ngModel)]="form.line_one" required /></ion-item>
          <ion-item><ion-input label="Interior o complemento" labelPlacement="stacked" name="lineTwo" [(ngModel)]="form.line_two" /></ion-item>
          <ion-item><ion-select label="Distrito" labelPlacement="stacked" name="district" [(ngModel)]="form.district" required>
            @for (district of districtOptions; track district) { <ion-select-option [value]="district">{{ district }}</ion-select-option> }
          </ion-select></ion-item>
          <ion-item><ion-textarea label="Referencia" labelPlacement="stacked" name="reference" [(ngModel)]="form.reference" /></ion-item>
          <ion-item><ion-checkbox name="default" [(ngModel)]="form.is_default">Usar como dirección principal</ion-checkbox></ion-item>
          @if (error()) { <p class="form-error" role="alert">{{ error() }}</p> }
          <ion-button expand="block" type="submit" [disabled]="saving()">{{ saving() ? 'Guardando…' : 'Guardar dirección' }}</ion-button>
        </form>
      }
      @if (loading()) {
        <p class="loading-state">Cargando direcciones…</p>
      } @else {
        <ion-list>@for (address of addresses(); track address.id) {
          <ion-item [class.selected-address]="preference.selected()?.id === address.id">
            <ion-label>
              <h2>{{ address.label }} @if (address.is_default) { <small>Principal</small> }</h2>
              <p>{{ address.recipient_name }} · {{ address.phone }}</p>
              <p>{{ address.line_one }}, {{ address.district }}</p>
              <div class="item-actions">
                <ion-button size="small" (click)="select(address)">{{ preference.selected()?.id === address.id ? 'Dirección elegida' : 'Enviar aquí' }}</ion-button>
                <ion-button size="small" fill="clear" (click)="edit(address)">Editar</ion-button>
                @if (!address.is_default) { <ion-button size="small" fill="clear" (click)="makeDefault(address)">Hacer principal</ion-button> }
                <ion-button size="small" color="danger" fill="clear" (click)="remove(address)">Eliminar</ion-button>
              </div>
            </ion-label>
          </ion-item>
        } @empty { <section class="empty-state"><p>Aún no tienes direcciones registradas.</p></section> }</ion-list>
      }
    </ion-content>
    <app-mobile-navigation />
  `,
})
export class AddressesPage {
  private readonly api = inject(ApiService);
  readonly preference = inject(AddressPreferenceService);
  readonly districtOptions = districts;
  readonly addresses = signal<Address[]>([]);
  readonly loading = signal(true);
  readonly saving = signal(false);
  readonly editing = signal(false);
  readonly error = signal('');
  private editingId: number | null = null;
  form: AddressPayload = this.emptyForm();

  constructor() { this.load(); }

  openForm(): void {
    if (this.editing()) this.cancel();
    else this.editing.set(true);
  }
  select(address: Address): void { this.preference.select(address); }

  edit(address: Address): void {
    this.editingId = address.id;
    this.form = { ...address };
    this.editing.set(true);
  }

  save(): void {
    this.saving.set(true);
    this.error.set('');
    const request = this.editingId ? this.api.updateAddress(this.editingId, this.form) : this.api.createAddress(this.form);
    request.subscribe({
      next: response => {
        if (response.data) this.preference.select(response.data);
        this.cancel();
        this.load();
      },
      error: error => { this.error.set(error.message); this.saving.set(false); },
    });
  }

  makeDefault(address: Address): void {
    this.api.makeDefaultAddress(address.id).subscribe({
      next: () => { this.preference.select(address); this.load(); },
      error: error => this.error.set(error.message),
    });
  }

  remove(address: Address): void {
    if (!confirm(`¿Eliminar la dirección "${address.label}"?`)) return;
    this.api.deleteAddress(address.id).subscribe({
      next: () => {
        if (this.preference.selected()?.id === address.id) this.preference.clear();
        this.load();
      },
      error: error => this.error.set(error.message),
    });
  }

  private load(): void {
    this.loading.set(true);
    this.api.addresses().subscribe({
      next: response => {
        this.addresses.set(response.data);
        if (!this.preference.selected()) {
          const initial = response.data.find(address => address.is_default) ?? response.data[0];
          if (initial) this.preference.select(initial);
        }
        this.loading.set(false);
      },
      error: error => { this.error.set(error.message); this.loading.set(false); },
    });
  }

  private cancel(): void {
    this.editingId = null;
    this.form = this.emptyForm();
    this.editing.set(false);
    this.saving.set(false);
  }

  private emptyForm(): AddressPayload {
    return { label: '', recipient_name: '', phone: '', line_one: '', line_two: '', district: '', province: 'Ica', department: 'Ica', reference: '', is_default: false };
  }
}
