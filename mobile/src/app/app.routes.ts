import { Routes } from '@angular/router';
import { authGuard } from './core/auth.guard';

export const routes: Routes = [
  { path: '', pathMatch: 'full', loadComponent: () => import('./features/home/home.page').then(module => module.HomePage) },
  { path: 'catalog', loadComponent: () => import('./features/catalog/catalog.page').then(module => module.CatalogPage) },
  { path: 'favorites', loadComponent: () => import('./features/favorites/favorites.page').then(module => module.FavoritesPage) },
  { path: 'profile', loadComponent: () => import('./features/profile/profile.page').then(module => module.ProfilePage) },
  { path: 'product/:slug', loadComponent: () => import('./features/catalog/product.page').then(module => module.ProductPage) },
  { path: 'cart', loadComponent: () => import('./features/cart/cart.page').then(module => module.CartPage) },
  { path: 'checkout', canActivate: [authGuard], loadComponent: () => import('./features/checkout/checkout.page').then(module => module.CheckoutPage) },
  { path: 'orders', canActivate: [authGuard], loadComponent: () => import('./features/orders/orders.page').then(module => module.OrdersPage) },
  { path: 'orders/:id', canActivate: [authGuard], loadComponent: () => import('./features/orders/order-detail.page').then(module => module.OrderDetailPage) },
  { path: 'addresses', canActivate: [authGuard], loadComponent: () => import('./features/addresses/addresses.page').then(module => module.AddressesPage) },
  { path: 'login', loadComponent: () => import('./features/auth/login.page').then(module => module.LoginPage) },
  { path: 'register', loadComponent: () => import('./features/auth/register.page').then(module => module.RegisterPage) },
  { path: 'notifications', canActivate: [authGuard], loadComponent: () => import('./features/notifications/notification-preferences.page').then(module => module.NotificationPreferencesPage) },
  { path: '**', redirectTo: '' },
];
