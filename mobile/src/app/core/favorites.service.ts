import { computed, inject, Injectable, signal } from '@angular/core';
import { firstValueFrom } from 'rxjs';
import { ApiService } from './api.service';
import { AuthService } from './auth.service';

@Injectable({ providedIn: 'root' })
export class FavoritesService {
  private readonly storageKey = 'cacao_favorites';
  private readonly api = inject(ApiService);
  private readonly auth = inject(AuthService);
  readonly ids = signal<number[]>(this.read());
  readonly count = computed(() => this.ids().length);

  has(variantId: number): boolean {
    return this.ids().includes(variantId);
  }

  async toggle(variantId: number): Promise<void> {
    const adding = !this.has(variantId);
    this.set(variantId, adding);
    if (!this.auth.authenticated()) return;

    try {
      await firstValueFrom(adding ? this.api.addFavorite(variantId) : this.api.removeFavorite(variantId));
    } catch {
      this.set(variantId, !adding);
      throw new Error('No pudimos actualizar tus favoritos.');
    }
  }

  async synchronize(): Promise<void> {
    if (!this.auth.authenticated()) return;
    const localIds = [...this.ids()];
    const response = await firstValueFrom(this.api.favorites());
    const merged = [...new Set([...response.data, ...localIds])];
    await Promise.all(localIds.filter(id => !response.data.includes(id)).map(id => firstValueFrom(this.api.addFavorite(id))));
    this.ids.set(merged);
    this.persist();
  }

  private set(variantId: number, enabled: boolean): void {
    this.ids.set(enabled ? [...new Set([...this.ids(), variantId])] : this.ids().filter(id => id !== variantId));
    this.persist();
  }

  private persist(): void {
    localStorage.setItem(this.storageKey, JSON.stringify(this.ids()));
  }

  private read(): number[] {
    try {
      const value = JSON.parse(localStorage.getItem(this.storageKey) ?? '[]');
      return Array.isArray(value) ? value.filter(Number.isInteger) : [];
    } catch {
      return [];
    }
  }
}
