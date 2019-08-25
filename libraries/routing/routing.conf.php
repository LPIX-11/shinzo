<?php

    function url_base() {
        // PROTOCOLE
        $protocole  = "";

        if  (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') { 

            $protocole = 'https'; 

        } else {
            $protocole = $_SERVER["SERVER_PROTOCOL"];

            $protocole = strtolower(explode("/", $protocole)[0]); 

        }

        $protocole = $protocole . "://";

        // Server name
        $server_name = $_SERVER["SERVER_NAME"];
        $server_name = $server_name . ":";

        //PORT
        $server_port = $_SERVER["SERVER_PORT"];

        //PATH
        $base_path = $_SERVER["PHP_SELF"];

        $tab = explode("/", $base_path);

        $base_path = "";

        for ($i = 1; $i < count($tab) - 1; $i++) {
            $base_path = $base_path . "/" . $tab[$i];
        }

        $base_path = $base_path . "/";
        //echo $base_path;

        $url = $protocole . $server_name . $server_port . $base_path;
        //echo $url;
        return $url;

    }
