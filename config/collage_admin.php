<?php

return [
    /*
    |--------------------------------------------------------------------------
    | URL secreta do editor de colagem (não divulgar publicamente)
    |--------------------------------------------------------------------------
    */
    'path' => env('ADMIN_COLLAGE_PATH', 'gestao-colagem-comclasse'),

    /*
    |--------------------------------------------------------------------------
    | Senha de acesso (defina no .env)
    |--------------------------------------------------------------------------
    */
    'password' => env('ADMIN_COLLAGE_PASSWORD', ''),

    'session_key' => 'collage_admin_authenticated',
];
