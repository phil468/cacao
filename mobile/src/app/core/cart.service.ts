import { computed, Injectable, signal } from '@angular/core';

export interface CartItem {
  variantId: number;
  name: string;
  priceAmount: number;
  quantity: number;
}

@Injectable({ providedIn: 'root' })
export class CartService {
  private readonly storageKey = 'cacao_cart';
  readonly items = signal<CartItem[]>(JSON.parse(localStorage.getItem(this.storageKey) ?? '[]'));
  readonly total = computed(() => this.items().reduce((sum, item) => sum + item.priceAmount * item.quantity, 0));

  add(item: CartItem): void {
    const items = [...this.items()];
    const existing = items.find(candidate => candidate.variantId === item.variantId);
    if (existing) {
      existing.quantity += item.quantity;
    } else {
      items.push(item);
    }
    this.items.set(items);
    this.persist();
  }

  remove(variantId: number): void {
    this.items.set(this.items().filter(item => item.variantId !== variantId));
    this.persist();
  }

  clear(): void {
    this.items.set([]);
    this.persist();
  }

  private persist(): void {
    localStorage.setItem(this.storageKey, JSON.stringify(this.items()));
  }
}
