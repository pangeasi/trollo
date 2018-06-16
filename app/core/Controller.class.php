<?php

class Controller {
    public $db = null;
    public $model = null;


    function __construct(){
        $this->openDatabaseConnection();
        $this->loadModel();
    }

    private function openDatabaseConnection() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, DB_OPTIONS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function loadModel() {
        require APP . 'model/Model.class.php';
        
        $this->model = new Model($this->db);
    }
    public function closeConnection() {
        $this->db = null;
    }




}




?>