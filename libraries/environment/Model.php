<?php
    namespace libraries\environment;

    class Model {
        protected $db;
        public function __construct(){

            $connection_parameters = connection_parameters();

            if($connection_parameters['eta'] == 'on')
            {
                require_once "DatabaseConnection.php";
                $this->db = getConnection();
            }
        }

    }