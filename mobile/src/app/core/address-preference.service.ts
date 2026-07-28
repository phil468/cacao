import { computed, Injectable, signal } from '@angular/core';
import { Address } from './models';

@Injectable({ providedIn: 'root' })
export class AddressPreferenceService {
  private readonly storageKey = 'cacao_delivery_address';
  readonly selected = signal<Address | null>(this.read());
  readonly label = computed(() => this.selected()?.label || this.selected()?.district || 'Selecciona una dirección');

  select(address: Address): void {
    this.selected.set(address);
    localStorage.setItem(this.storageKey, JSON.stringify(address));
  }

  clear(): void {
    this.selected.set(null);
    localStorage.removeItem(this.storageKey);
  }

  private read(): Address | null {
    try {
      return JSON.parse(localStorage.getItem(this.storageKey) ?? 'null') as Address | null;
    } catch {
      return null;
    }
  }
}
