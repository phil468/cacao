import { computed, Injectable, signal } from '@angular/core';
import { User } from './models';

@Injectable({ providedIn: 'root' })
export class AuthService {
  private readonly tokenKey = 'auth_token';
  private readonly userKey = 'auth_user';
  readonly user = signal<User | null>(this.readUser());
  readonly authenticated = computed(() => Boolean(this.token()));

  token(): string | null {
    return localStorage.getItem(this.tokenKey);
  }

  startSession(token: string, user: User): void {
    localStorage.setItem(this.tokenKey, token);
    localStorage.setItem(this.userKey, JSON.stringify(user));
    this.user.set(user);
  }

  endSession(): void {
    localStorage.removeItem(this.tokenKey);
    localStorage.removeItem(this.userKey);
    this.user.set(null);
  }

  private readUser(): User | null {
    try {
      const value = localStorage.getItem(this.userKey);
      return value ? JSON.parse(value) as User : null;
    } catch {
      localStorage.removeItem(this.userKey);
      return null;
    }
  }
}
