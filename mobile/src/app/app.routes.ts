import { Routes } from '@angular/router';

export const routes: Routes = [
  { path: '', pathMatch: 'full', loadComponent: () => import('./features/home/home.page').then(module => module.HomePage) },
  { path: 'catalog', loadComponent: () => import('./features/catalog/catalog.page').then(module => module.CatalogPage) },
  { path: 'product/:slug', loadComponent: () => import('./features/catalog/product.page').then(module => module.ProductPage) },
  { path: 'cart', loadComponent: () => import('./features/cart/cart.page').then(module => module.CartPage) },
  { path: 'checkout', loadComponent: () => import('./features/checkout/checkout.page').then(module => module.CheckoutPage) },
  { path: 'orders', loadComponent: () => import('./features/orders/orders.page').then(module => module.OrdersPage) },
  { path: 'orders/:id', loadComponent: () => import('./features/orders/order-detail.page').then(module => module.OrderDetailPage) },
  { path: 'addresses', loadComponent: () => import('./features/addresses/addresses.page').then(module => module.AddressesPage) },
  { path: 'login', loadComponent: () => import('./features/auth/login.page').then(module => module.LoginPage) },
  { path: 'notifications', loadComponent: () => import('./features/notifications/notification-preferences.page').then(module => module.NotificationPreferencesPage) },
  { path: '**', redirectTo: '' },
];
