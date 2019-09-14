<?php

    namespace src\model;

    use libraries\components\Model;

    /**
     * @inheritdoc
     */
    class SampleModel extends Model {
        public function __construct(){
            parent::__construct();
        }

        function test_db_access()
        {
            try {
                $sql = 'SELECT * FROM reponses';
                return $this->database->query($sql)->fetch();
            } catch (\Throwable $th) {
                throw $th;
            }
            
        }
    }