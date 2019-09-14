<?php

    namespace libraries\components;

    /**
     * @author Mohamed Johnson
     * This class handles connection beetween the dev's database classes to the database
     * @param connection_params() eta
     */
    class Model {
        protected $database;

        public function __construct(){

            $connection_params = connection_parameters();

            if($connection_params['eta'] == 'on')
            {
                require_once "DatabaseConnection.php";
                $this->database = getConnection();

            }
        }

    }