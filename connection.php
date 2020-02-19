<?php
class Connection {
    private $dbhost = null;
    private $dbuser = null;
    private $dbpass = null;
    private $db = null;

    private $conn;
    
    public function __construct() 
    {
        $this->dbhost = 'localhost';
        $this->dbuser = 'root';
        $this->dbpass = '1234';
        $this->db = 'app_mobile_course';
    }

    private function OpenCon()
    {
        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->db) or die("Connect failed: %s\n". $conn -> error);
        return true;
    }

    public function authenticate( $username, $password ) {
        $this->OpenCon();
        $sqlQuery = "SELECT name FROM user WHERE username = ? AND password = ? LIMIT 1";

        $response = false;
        /* crear una sentencia preparada */
        if ($stmt = $this->conn->prepare($sqlQuery)) {
            /* ligar parámetros para marcadores */
            $stmt->bind_param('ss', $username, $password);
            /* ejecutar la consulta */
            $stmt->execute();
            /* obtener valor */
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ( $row != false ) {
                $response = [
                    'name' => $row['name']
                ];
                var_dump($response);exit;
                /* cerrar sentencia */
                $stmt->close();
            }
        }

        /* cerrar conexión */
        $this->CloseCon();

        return $response;
    }
    
    public function CloseCon()
    {
        $this->conn->close();
    }
}

?>