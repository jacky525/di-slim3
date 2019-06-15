<?php

return [
    "database" =>[
        "connections" => [
            "sc00002" => [
                'driver'    => 'mysql',
                'host'      => $appEnvConfig['DB_SC00002_HOST'],
                'port'      => $appEnvConfig['DB_SC00002_PORT'],
                'database' =>  $appEnvConfig['DB_SC00002_DATABASE'],
                'username'  => $appEnvConfig['DB_SC00002_USERNAME'],
                'password'  => $appEnvConfig['DB_SC00002_PASSWORD'],
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ],
        ]
    ]
];
