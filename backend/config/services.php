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
];
