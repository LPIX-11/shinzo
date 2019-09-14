<?php

    /**
     * @author Mohamed Johnson
     * This class handle the database connection
     * - It takes the needed informations from database.php file
     * - Tests if the database exist or if all informations are correct
     * @param conection_parameters()
     */
    function getConnection() {

        $connection_params = connection_parameters();

        $dsn = "mysql:host=".$connection_params['host'].";dbname=".$connection_params['database_name'];
        $user = $connection_params['user'];
        $password = $connection_params['password'];

        try {
            $database = new PDO (
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
        return $database;
    }