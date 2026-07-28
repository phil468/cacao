import { HttpErrorResponse, HttpInterceptorFn } from '@angular/common/http';
import { inject } from '@angular/core';
import { Router } from '@angular/router';
import { catchError, throwError } from 'rxjs';
import { AuthService } from './auth.service';

export const authInterceptor: HttpInterceptorFn = (request, next) => {
  const token = inject(AuthService).token();
  return next(request.clone({
    setHeaders: {
      Accept: 'application/json',
      ...(token ? { Authorization: `Bearer ${token}` } : {}),
    },
  }));
};

export const errorInterceptor: HttpInterceptorFn = (request, next) => {
  const auth = inject(AuthService);
  const router = inject(Router);
  return next(request).pipe(catchError((error: HttpErrorResponse) => {
    if (error.status === 401 && auth.authenticated()) {
      auth.endSession();
      void router.navigate(['/login'], { queryParams: { returnUrl: router.url } });
    }
    const validation = error.error?.errors ? Object.values(error.error.errors).flat()[0] : null;
    const message = String(validation ?? error.error?.message ?? networkMessage(error.status));
    return throwError(() => new Error(message));
  }));
};

function networkMessage(status: number): string {
  if (status === 0) return 'No pudimos conectar con la tienda. Revisa tu conexión e inténtalo nuevamente.';
  if (status >= 500) return 'La tienda no está disponible temporalmente. Inténtalo en unos minutos.';
  return 'No pudimos completar la operación.';
}
