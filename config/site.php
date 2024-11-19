<?php

// config/site.php
return [
    'name' => env('APP_NAME', 'Your Florist Store'),
    'meta' => [
        'title_separator' => ' - ',
        'default_description' => 'Fresh flowers and floral arrangements in [Location]. Same-day delivery available.',
        'default_keywords' => 'florist, flowers, bouquet, floral arrangements, flower delivery',
        'default_image' => '/images/og-default.jpg',
    ],
    'social' => [
        'facebook' => env('SOCIAL_FACEBOOK'),
        'instagram' => env('SOCIAL_INSTAGRAM'),
        'whatsapp' => env('SOCIAL_WHATSAPP'),
    ],
];
