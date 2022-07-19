<?php

return [
    'name' => env('SERVICE_NAME', 'catalog'),
    'apps' => [
        'thinkpro' => [
            'base_uri' => env('SERVICE_THINKPRO_BASE_API', 'catalog/thinkpro/api'),
        ],
        'nicespace' => [
            'base_uri' => env('SERVICE_NICESPACE_BASE_API', 'catalog/nicespace/api'),
        ],
        'cms' => [
            'base_uri' => env('SERVICE_CMS_BASE_API', 'catalog/cms/api'),
        ],
    ],
];
