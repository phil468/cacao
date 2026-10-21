import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
export default defineConfig({plugins:[laravel({input:['resources/css/app.css','resources/js/app.js','resources/js/promo-scanner.js','resources/js/pos/main.ts'],refresh:true}),vue(),tailwindcss()]});

