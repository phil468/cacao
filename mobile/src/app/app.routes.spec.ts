import { routes } from './app.routes';

describe('application routes', () => {
  it('matches the home page only for the exact empty path', () => {
    const home = routes.find(route => route.path === '');
    expect(home?.pathMatch).toBe('full');
    expect(routes.some(route => route.path === 'catalog')).toBeTrue();
    expect(routes.some(route => route.path === 'login')).toBeTrue();
    expect(routes.some(route => route.path === 'addresses')).toBeTrue();
  });
});
