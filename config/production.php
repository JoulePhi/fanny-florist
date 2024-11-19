<?php

return [
    'optimizations' => [
        'minify_html' => true,
        'compress_images' => true,
        'cache_responses' => true,
        'defer_scripts' => true,
        'preload_assets' => [
            '/css/app.css',
            '/js/app.js',
            '/fonts/main-font.woff2',
        ],
    ],
];
