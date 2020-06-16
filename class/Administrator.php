<?php
include_once("DB.php");
include_once "AdmissionsReport.php";

class Administrator
{
    public $id;
    public $username;
    private $password;
    public $email;
    public $phone;
    public $role;

//  check username and password for this administrator login

    /**
     * Administrator constructor.
     */
    public function __construct()
    {
        $this->id = null;
        $this->username = null;
        $this->password = null;
        $this->email = null;
        $this->phone = null;
        $this->role = null;
    }

    public function login($username, $password)
    {
        $conn = (new DB())->conn;
        $query = "select * from Admin where username = '$username'";   // check if the username exists
        $result = mysqli_query($conn, $query);  //  run the query
        if ($result->num_rows == 1) {    // if the username exists, check the password
            while ($row = $result->fetch_assoc()) {   //  fetching the data
                if ($row['password'] == $password) {  //  if username and password are correct, I set information to this administrator login
                    $this->id = $row['id'];
                    $this->username = $row['username'];
                    $this->password = $row['password'];
                    $this->email = $row['email'];
                    $this->phone = $row['phone'];
                    $this->role = $row['role'];
                }
            }
        }
        $conn->close();
    }

    /**
     * @name showAdmissions
     * @return admission array
     */
    public function showAdmissions()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Admission";
        $admissions = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $admission = new AdmissionsReport($row["AdmissionID"], $row["description"], $row["admissiondate"], $row["status"], $this->findPatientByPatientID($row["patientID"]), $this->findMedicationsByAdmission($row["AdmissionID"]));
                array_push($admissions, $admission);
            }
        }
        $conn->close();
        return $admissions;
    }


    /**
     * @param $patientID
     * @return array
     */
    public function findPatientByPatientID($patientID)
    {
        $conn = (new DB())->conn;
        $sql = "select * from Patient where PatientID = " . $patientID;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["PatientID"];
                $lastname = $row["lastname"];
                $firstname = $row["firstname"];
            }
        }
        $conn->close();
        return array($id, $lastname, $firstname);
    }

    /**
     * @param $wardID
     * @return string
     */
    public function findWardByWardID($wardID)
    {
        $conn = (new DB())->conn;
        $sql = "select * from Ward where WardID = " . $wardID;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $wardname = $row["lastname"] . ", " . $row["firstname"];
            }
        }
        $conn->close();
        return $wardname;
    }

    public function findMedicationsByAdmission($admissionID)
    {
        $conn = (new DB())->conn;
        $sql = "select Medication.name from Medication, Prescription, Admission where Medication.MedicationID = Prescription.medicationID and Prescription.admissionID = Admission.AdmissionID and Admission.AdmissionID = " . $admissionID;
//        echo $sql;
        $result = $conn->query($sql);
        $medicationnames = "";
        if ($result->num_rows>0){
            while ($row=$result->fetch_assoc()){
                $medicationnames .=$row["name"]." ";
            }
        }
        $conn->close();
        //echo "Medications:" . $medicationnames;
        return $medicationnames;

    }
//    // doctors report start
//    /**
//     * @name doctors
//     * @return doctor array
//     */
//    public function showDoctors(){
//        $conn = (new DB())->conn;
//        $sql = "select * from Admission";
//        $doctors = array();
//        $result = $conn->query($sql);
//        if ($result->num_rows>0){
//            while ($row = $result->fetch_assoc()){
//                $doctor = new Doctor($row["DoctorID"], $row["lastname"], $row["firstname"], $row["street"], $row["suburb"], $row["city"], $row["phone"], $row["speciality"], $row["salary"]);
//                array_push($doctors,$doctor);
//            }
//        }
//        $conn->close();
//        return $doctors;
//    }

}
