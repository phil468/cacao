import { TestBed } from '@angular/core/testing';
import { CartService } from './cart.service';

describe('CartService', () => {
  let service: CartService;

  beforeEach(() => {
    localStorage.clear();
    TestBed.resetTestingModule();
    service = TestBed.inject(CartService);
  });

  it('merges equal variants without exceeding stock', () => {
    service.add({ variantId: 4, name: 'Chocolate', priceAmount: 1400, quantity: 2, stock: 3 });
    service.add({ variantId: 4, name: 'Chocolate', priceAmount: 1400, quantity: 2, stock: 3 });
    expect(service.items()[0].quantity).toBe(3);
    expect(service.total()).toBe(4200);
  });

  it('persists quantity changes locally', () => {
    service.add({ variantId: 7, name: 'Grageas', priceAmount: 1000, quantity: 1, stock: 5 });
    service.update(7, 4);
    expect(JSON.parse(localStorage.getItem('cacao_cart') ?? '[]')[0].quantity).toBe(4);
  });
});
