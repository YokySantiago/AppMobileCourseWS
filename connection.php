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

    public function OpenCon()
    {
        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->db) or die("Connect failed: %s\n". $conn -> error);
        return true;
    }
    
    public function CloseCon($conn)
    {
        $this->conn->close();
    }
}

?>