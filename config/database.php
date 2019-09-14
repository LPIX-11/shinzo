<?php
    // This function is used to connect to the wanted database
    function connection_parameters()
    {
        return ['host'          => $_ENV['host'],
                'user'          => $_ENV['user'],
                'password'      => $_ENV['password'],
                'database_name' => $_ENV['database_name'],
                'eta'           => $_ENV['eta'], // Turn the eta to on if you want to connect to you
            ];
    }