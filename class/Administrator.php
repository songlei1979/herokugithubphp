<?php
include_once ("DB.php");
include_once ("Student.php");
class Administrator
{
    public $id;
    public $username;
    private $password;
    private $conn;
//from beginning, I don't need any inforamtion, I only create a connection to database for login user
    public function __construct()
    {
        $this->conn = (new DB())->conn;
    }

//    I check username and password for this administrator login
    public function login($username, $password){
        //1. I check his username
        $query = "select * from administrator where username = '$username'";
        echo $query;
//        $result = mysqli_query($this->dbconn, $query);
//        if ($result->num_rows == 1){ //2. if there is a record, I will check his password
//            while ($row = $result->fetch_assoc()){
//                if ($row['password'] == $password){
//                    //3. if username and password are correct, I set information to this administrator login
//                    $this->id = $row['id'];
//                    $this->username = $username;
//                    $this->password = $password;
//                }
//            }
//        }
    }

    public function showStudents(){
        $query = "select * from student";
        $result = mysqli_query($this->conn, $query);
        if ($result->num_rows > 0){
            $students = array(); //for transfer data, I use objects array
            while ($row = $result->fetch_row()){
                $student = new Student($row['id'], $row['name'], $row['username'], $row['password']);
                array_push($students, $student);
            }
            return $students;
        }else{
            return null;
        }
    }
}