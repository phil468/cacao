# Cacao del Perú Mobile

Ionic 8 + Angular 20 + Capacitor 8 application for the Cacao del Perú API.

## Local development

1. Start the Laravel backend at `http://localhost:8000`.
2. Run `npm ci`.
3. Run `npm start`.
4. Open `http://localhost:4200`.

The development API URL is defined in `src/environments/environment.ts`. Production builds use `https://cacaodelperu.com/api/v1`.

## Quality checks

```bash
npm run lint
npm test -- --browsers=ChromeHeadless
npm run build -- --configuration production
```

## Android

1. Install Android Studio and an Android SDK supported by Capacitor 8.
2. Add the Firebase file `google-services.json` to `android/app/` locally or through a protected CI secret. Never commit it.
3. Run `npm run build -- --configuration production`.
4. Run `npx cap sync android`.
5. Run `npx cap open android`.

Push notifications require a real Android device or emulator with Google Play Services. Browser mode intentionally does not register push tokens.
