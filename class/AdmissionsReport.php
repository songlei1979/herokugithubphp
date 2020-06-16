<?php


class AdmissionsReport
{
    public $AdmissionID;
    public $description;
    public $admissiondate;
    public $status;
    public $patient;
    public $medication;

    /**
     * AdmissionsReport constructor.
     * @param $AdmissionID
     * @param $description
     * @param $admissiondate
     * @param $status
     * @param $patient
     * @param $medication
     */
    public function __construct($AdmissionID, $description, $admissiondate, $status, $patient, $medication)
    {
        $this->AdmissionID = $AdmissionID;
        $this->description = $description;
        $this->admissiondate = $admissiondate;
        $this->status = $status;
        $this->patient = $patient;
        $this->medication = $medication;
    }
}
