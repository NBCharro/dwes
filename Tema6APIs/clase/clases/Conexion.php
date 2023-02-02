<?php
class Conexion extends mysqli
{
    private $host = "localhost";
    private $db = "laescuela";
    private $user = "laescuela";
    private $pass = "laescuela";
    public function __construct()
    {
        try {
            parent::__construct($this->host, $this->user, $this->pass, $this->db);
        } catch (mysqli_sql_exception $e) {
            echo "ERROR: {$e->getMessage()}";
            // Normalmente se pondria lo siguiente pero queremos ver si falla algo, por eso el echo
            // header("HTTP/1.1 400 Bad Request");
            exit;
        }
    }
}
