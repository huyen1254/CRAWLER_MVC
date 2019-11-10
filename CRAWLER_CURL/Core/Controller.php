<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $model = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadModel();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        $this->db=mysql_conn(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if (!$this->db) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
	        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	        exit;
        }
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel()
    {
        require APP . 'Model/model.php';
        // create new "model" (and pass the database connection)
        $this->model = new Model($this->db);
    }
}
