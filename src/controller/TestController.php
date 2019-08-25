<?php

    use libraries\environment\Controller;

    class Test extends Controller 
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            echo json_encode(date('Y'));
        }
    }
    