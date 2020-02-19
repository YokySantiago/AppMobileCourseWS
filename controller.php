<?php

require_once('user.php');
class Controller {

    public function __construct() {
    }

    public function login() {
        $response = [
            'status' => 'error',
            'name' => null
        ];
        if( isset($_POST['username'], $_POST['password']) ) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $model = new User();
            $result =  $model->authenticate($username, $password);
            if( $result != false ) {
                $response = [
                    'status' => 'success',
                    'name' => $result['name']
                ];
            }
        } 
        echo json_encode($response);
    }
} 

(new Controller())->login();