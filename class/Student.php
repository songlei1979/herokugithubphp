<?php
include_once "DB.php";

class Student
{
    public $id;
    public $name;
    public $username;
    public $password;
    private $dbconn;

    public function __construct($id, $name, $username, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        //
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn;
        if (is_null($this->id)){
            $query = "insert into student values (null, '$this->name', '$this->username', '$this->password')";
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update student SET name = '$this->name' where id = $this->id";
            mysqli_query($query);
        }
        $this->dbconn->close();
    }

}
