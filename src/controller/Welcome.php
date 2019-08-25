<?php

    class Welcome {
        
        function index()
        {
            $url = url_base();

            require_once './src/view/welcome/index.html';
        }
    }