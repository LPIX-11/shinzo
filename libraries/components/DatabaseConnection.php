<?php

    function getConnection() {

        $connection_parameters = connection_parameters();

        $dsn = "mysql:host=".$connection_parameters['host'].";dbname=".$connection_parameters['database_name'];
        $user = $connection_parameters['user'];
        $password = $connection_parameters['password'];

        try {
            $db = new PDO (
                            $dsn,
                            $user,
                            $password,
                            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

        }catch (PDOException $ex){
            $db_error = $ex->getMessage();

            if(substr($db_error, 0, 39) == "SQLSTATE[HY000] [1049] Unknown database")
            {   
                $message = "No database found";
                die($message);
            }
            else if(substr($db_error, 0, 22) == "SQLSTATE[HY000] [1045]")
            {   
                $message = "Database username or password parameters not found";
                die($message);
                
            } else {
                $message = $ex->getMessage();
                die($message);
            }
        }
        return $db;
    }