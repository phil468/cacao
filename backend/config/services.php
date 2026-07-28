<?php

return [
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI', '/auth/google/callback'),
    ],
    'whatsapp' => [
        'number' => env('WHATSAPP_NUMBER'),
        'message' => env('WHATSAPP_MESSAGE', 'Hola, deseo información sobre los productos de Cacao del Perú.'),
    ],
    'telegram' => [
        'enabled' => env('TELEGRAM_ENABLED', false),
        'bot_token' => env('TELEGRAM_BOT_TOKEN'),
        'chat_id' => env('TELEGRAM_CHAT_ID'),
    ],
    'whatsapp_cloud' => [
        'access_token' => env('WHATSAPP_CLOUD_ACCESS_TOKEN'),
        'phone_number_id' => env('WHATSAPP_CLOUD_PHONE_NUMBER_ID'),
        'graph_version' => env('WHATSAPP_CLOUD_GRAPH_VERSION'),
        'order_template' => env('WHATSAPP_CLOUD_ORDER_TEMPLATE', 'order_status_update_v1'),
        'app_secret' => env('WHATSAPP_CLOUD_APP_SECRET'),
        'webhook_verify_token' => env('WHATSAPP_WEBHOOK_VERIFY_TOKEN'),
    ],
    'fcm' => [
        'project_id' => env('FCM_PROJECT_ID'),
        'credentials' => env('GOOGLE_APPLICATION_CREDENTIALS'),
    ],
    'sms' => ['enabled' => false],
    'izipay' => [
        'enabled' => env('IZIPAY_ENABLED', false),
        'environment' => env('IZIPAY_ENVIRONMENT', 'sandbox'),
        'merchant_code' => env('IZIPAY_MERCHANT_CODE'),
        'api_key' => env('IZIPAY_API_KEY'),
        'api_key_header' => env('IZIPAY_API_KEY_HEADER', 'Authorization'),
        'api_key_prefix' => env('IZIPAY_API_KEY_PREFIX', 'Bearer'),
        'hash_key' => env('IZIPAY_HASH_KEY'),
        'public_key' => env('IZIPAY_PUBLIC_KEY'),
        'session_token_url' => env('IZIPAY_SESSION_TOKEN_URL'),
        'postal_code' => env('IZIPAY_POSTAL_CODE', '11001'),
    ],
];
