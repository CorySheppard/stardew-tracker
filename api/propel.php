<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'stardew-tracker' => [
                    'adapter' => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn' => 'mysql:host=localhost;dbname=stardew-tracker;charset=utf8',
                    'user' => 'root',
                    'password' => '',
                    'settings' => [
                        'charset' => 'utf8mb4',
                        'queries' => [
                            'utf8' => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci, COLLATION_CONNECTION = utf8mb4_unicode_ci, COLLATION_DATABASE = utf8mb4_unicode_ci, COLLATION_SERVER = utf8mb4_unicode_ci'
                        ]
                    ]
                ]
            ]
        ]
    ]
];