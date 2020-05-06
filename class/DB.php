<?php


class DB
{
    var $conn;
    var $servername = "kf3k4aywsrp0d2is.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    var $dbusername = "sf6mcpjg9mp3fqnc";
    var $dbpassword = "zv91vgnxsb4bggba";
    var $dbname = "hwedspsyvc8ffi0y";

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $conn = new mysqli($this->servername, $this->dbusername, $this->dbpassword, $this->dbname);
        if (!$conn->connect_error){
            $this->conn =$conn;
        }
    }
}
