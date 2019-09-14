<?php

    /**
     * 
     */
    function url_base() {
        
        // Retrieving server's used protocol
        $protocol  = "";
        if  (filter_input(INPUT_SERVER, 'HTTPS') && (filter_input(INPUT_SERVER, 'HTTPS') == 'on' || filter_input(INPUT_SERVER, 'HTTPS') == 1) || filter_input(INPUT_SERVER, 'HTTP_X_FORWARDED_PROTO') && filter_input(INPUT_SERVER, 'HTTP_X_FORWARDED_PROTO') == 'https') { 

            $protocol = 'https'; 

        } else {
            $protocol = filter_input(INPUT_SERVER, "SERVER_PROTOCOL");
            $protocol = strtolower(explode("/", $protocol)[0]); 

        }

        $protocol = $protocol . "://";

        // Server name
        $server_name = filter_input(INPUT_SERVER, "SERVER_NAME");
        $server_name = $server_name . ":";

        // Server port
        $server_port = filter_input(INPUT_SERVER, "SERVER_PORT");

        // Retrieving server's base path
        $base_path = filter_input(INPUT_SERVER, "PHP_SELF");

        $tab = explode("/", $base_path);
        $base_path = "";

        for ($i = 1; $i < count($tab) - 1; $i++) {
            $base_path = $base_path . "/" . $tab[$i];
        }

        $base_path = $base_path . "/";

        // Building complete base url
        $url = $protocol . $server_name . $server_port . $base_path;
        
        return $url;

    }
