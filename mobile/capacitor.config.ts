/// <reference types="@capacitor/push-notifications" />
import type { CapacitorConfig } from '@capacitor/cli';

const config: CapacitorConfig = {
  appId: 'com.cacaodelperu.app',
  appName: 'Cacao del Perú',
  webDir: 'www/browser',
  server: { androidScheme: 'https' },
  plugins: {
    PushNotifications: {
      presentationOptions: ['badge', 'sound', 'banner', 'list'],
    },
  },
};

export default config;
