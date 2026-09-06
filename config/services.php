<?php

return [

    'behinpayam' => [
        'url' => env(
            'BEHINPAYAM_URL',
            'https://api.sms-webservice.com/api/V3/Send'
        ),

        'api_key' => env('BEHINPAYAM_API_KEY'),

        'sender' => env(
            'BEHINPAYAM_SENDER',
            '9998624173'
        ),
    ],

    'sms' => [
        'secretary_mobile' => env('SMS_SECRETARY_MOBILE'),
    ],

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env(
                'SLACK_BOT_USER_OAUTH_TOKEN'
            ),

            'channel' => env(
                'SLACK_BOT_USER_DEFAULT_CHANNEL'
            ),
        ],
    ],

];
