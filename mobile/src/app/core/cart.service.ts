import { computed, Injectable, signal } from '@angular/core';

export interface CartItem {
  variantId: number;
  name: string;
  priceAmount: number;
  quantity: number;
  stock: number;
  imageUrl?: string | null;
}

@Injectable({ providedIn: 'root' })
export class CartService {
  private readonly storageKey = 'cacao_cart';
  readonly items = signal<CartItem[]>(this.readItems());
  readonly total = computed(() => this.items().reduce((sum, item) => sum + item.priceAmount * item.quantity, 0));

  add(item: CartItem): void {
    const items = [...this.items()];
    const existing = items.find(candidate => candidate.variantId === item.variantId);
    if (existing) {
      existing.quantity = Math.min(existing.quantity + item.quantity, item.stock);
      existing.stock = item.stock;
    } else {
      items.push(item);
    }
    this.items.set(items);
    this.persist();
  }

  update(variantId: number, quantity: number): void {
    const items = this.items().map(item => item.variantId === variantId
      ? { ...item, quantity: Math.max(1, Math.min(quantity, item.stock)) }
      : item);
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

  private readItems(): CartItem[] {
    try {
      const items = JSON.parse(localStorage.getItem(this.storageKey) ?? '[]') as CartItem[];
      return Array.isArray(items) ? items.map(item => ({ ...item, stock: Number(item.stock ?? 99) })) : [];
    } catch {
      localStorage.removeItem(this.storageKey);
      return [];
    }
  }
}
