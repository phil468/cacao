export interface User {
  id: number;
  name: string;
  email: string;
  phone?: string | null;
}

export interface ProductImage {
  id: number;
  product_variant_id?: number | null;
  path: string;
  alt_text?: string | null;
  is_primary: boolean;
}

export function publicAssetUrl(path?: string | null): string | null {
  if (!path) return null;
  if (/^https?:\/\//.test(path)) return path;
  const base = new URL(environmentApiOrigin());
  return `${base.origin}/storage/${path.replace(/^\/?(storage\/)?/, '')}`;
}

function environmentApiOrigin(): string {
  return environment.apiUrl.replace(/\/api\/v1\/?$/, '');
}

export interface ProductVariant {
  id: number;
  name: string;
  sku: string;
  cacao_percentage?: number | null;
  weight_grams?: number | null;
  price_amount: number;
  promotional_price_amount?: number | null;
  stock: number;
  image?: ProductImage | null;
}

export interface Product {
  id: number;
  name: string;
  slug: string;
  short_description?: string | null;
  description?: string | null;
  is_featured?: boolean;
  category?: { id: number; name: string; slug: string } | null;
  images: ProductImage[];
  variants: ProductVariant[];
}

export interface Address {
  id: number;
  label: string;
  recipient_name: string;
  phone: string;
  line_one: string;
  line_two?: string | null;
  district: string;
  province: string;
  department: string;
  reference?: string | null;
  is_default: boolean;
  latitude?: number | null;
  longitude?: number | null;
}

export type AddressPayload = Omit<Address, 'id'>;
export interface ApiCollection<T> { data: T[]; }
export interface ApiItem<T> { data: T; }
import { environment } from '../../environments/environment';
