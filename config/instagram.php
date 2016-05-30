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
            'id' => '7c39848e6d4f473cb911f96480862259',
            'secret' => 'f373021a01744f3b886cf1725002f6ac',
            // 'code' => '37e6c56454c745848de4e41d06f53fb9',
            'access_token' => '204497223.7c39848.eb13d21d29e64f6ea8d125a8efd740f0',
        ],

        'alternative' => [
            'id' => 'your-client-id',
            'secret' => 'your-client-secret',
            'access_token' => null,
        ],

    ],

];
