<?php 

require_once('Connection.php');

class User {
    private $conn = null;
    public function __constructor() {
        $this->conn = new Connection();
    }

    public function authenticate( $username, $password ) {

        $sqlQuery = 'SELECT name FROM user WHERE username = ? AND password = ?';
        $name = '';
        /* crear una sentencia preparada */
        if ($stmt = $this->conn->prepare($sqlQuery)) {
            /* ligar parámetros para marcadores */
            $stmt->bind_param('s', $username);
            $stmt->bind_param('s', $password);
            /* ejecutar la consulta */
            $stmt->execute();
            /* ligar variables de resultado */
            $stmt->bind_result($name);
            /* obtener valor */
            $stmt->fetch();
            /* cerrar sentencia */
            $stmt->close();
        }

        /* cerrar conexión */
        $mysqli->close();
        return $name;
    }
}