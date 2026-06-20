<?php

return [
    /*
    | Slugs reservados — não podem ser usados em encaminhamentos.
    */
    'reserved_slugs' => [
        'admin',
        'api',
        'biografia',
        'contato',
        'css',
        'fonts',
        'home',
        'imagens_hero',
        'imagens_instagram',
        'js',
        'login',
        'orcamento',
        'questionario',
        'servicos',
        'storage',
        'uploads',
        trim((string) env('ADMIN_COLLAGE_PATH', 'gestao-colagem-comclasse'), '/'),
    ],
];
