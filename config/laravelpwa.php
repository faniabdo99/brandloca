<?php

return [
    'name' => 'Arte Kids',
    'manifest' => [
        'name' => 'Arte Kids',
        'short_name' => 'Arte',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#FEC906',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => './public/images/pwa-logo/icon-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => './public/images/pwa-logo/icon-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => './public/images/pwa-logo/icon-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => './public/images/pwa-logo/icon-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => './public/images/pwa-logo/icon-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => './public/images/pwa-logo/icon-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => './public/images/pwa-logo/icon-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => './public/images/pwa-logo/icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => './public/images/pwa-spalsh/splash-640x1136.png',
            '750x1334' => './public/images/pwa-spalsh/splash-750x1334.png',
            '828x1792' => './public/images/pwa-spalsh/splash-828x1792.png',
            '1125x2436' => './public/images/pwa-spalsh/splash-1125x2436.png',
            '1242x2208' => './public/images/pwa-spalsh/splash-1242x2208.png',
            '1242x2688' => './public/images/pwa-spalsh/splash-1242x2688.png',
            '1536x2048' => './public/images/pwa-spalsh/splash-1536x2048.png',
            '1668x2224' => './public/images/pwa-spalsh/splash-1668x2224.png',
            '1668x2388' => './public/images/pwa-spalsh/splash-1668x2388.png',
            '2048x2732' => './public/images/pwa-spalsh/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'الرئيسية',
                'description' => 'شرح الرئيسية',
                'url' => '/',
                'icons' => [
                    "src" => "./public/images/pwa-logo/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
        ],
        'custom' => []
    ]
];
