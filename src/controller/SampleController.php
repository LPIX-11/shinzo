<?php

    use libraries\components\Controller;
    use src\model\SampleModel;

    class Sample extends Controller 
    {
        private $db;

        public function __construct()
        {
            parent::__construct();
            $this->db = new SampleModel();
        }

        public function index()
        {
            $survey = $this->db->test_db_access();

            $result =  json_encode($survey, JSON_PRETTY_PRINT);

            require_once './src/view/sample/index.html';
        }
    }
    