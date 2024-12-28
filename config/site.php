<?php

// config/site.php
return [
    'name' => env('APP_NAME', 'Fanny Florist'),
    'meta' => [
        'title_separator' => ' - ',
        'default_description' => 'Toko bunga terbaik di kota Bandung. Menyediakan berbagai macam rangkaian bunga segar untuk berbagai acara.',
        'default_keywords' => 'toko bunga, bunga segar, florist bandung, toko bunga bandung, bunga papan, bunga meja',
        'default_image' => '/images/og-default.jpg',
    ],
    'social' => [
        'facebook' => env('SOCIAL_FACEBOOK'),
        'instagram' => env('SOCIAL_INSTAGRAM'),
        'whatsapp' => env('SOCIAL_WHATSAPP'),
    ],
];
