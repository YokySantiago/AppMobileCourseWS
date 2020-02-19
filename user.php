<?php 

require_once('connection.php');

class User {
    private $conn = null;
    private $model = null;

    public function __construct() {
        $this->model = new Connection();
    }

    public function authenticate( $username, $password ) {

        $response = $this->model->authenticate($username, $password);
        return $response;
    }
}