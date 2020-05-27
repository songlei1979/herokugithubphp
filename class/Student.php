<?php
/**
 * Author: ...
 * Date: ...
 * Version: ...
 * Purpose:...
 */
include_once "DB.php";

/**
 * Class Student
 */
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
        $query = "insert into your_tablename values ('$this->name','','')";
    }

    public function edit(){

    }

    public function delete(){

    }


}
