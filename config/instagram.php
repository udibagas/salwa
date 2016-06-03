<?php

/*
 * This file is part of Laravel Instagram.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Instagram Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'id' => 'ee5ab4be1af04923a60366d7b3405286',
            'secret' => '08dda4ffa0fd464f84a86ff9d9d88f77',
            // 'code' => '4714371cadc24ba7a78f4690e66de024',
            'access_token' => '515901229.ee5ab4b.c6ea0c8cb0664377ad055d079a0753b1',
        ],

        'alternative' => [
            'id' => 'your-client-id',
            'secret' => 'your-client-secret',
            'access_token' => null,
        ],

    ],

];
