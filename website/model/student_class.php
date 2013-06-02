<?php
class Student {
    private $s_id, $case_work, $fname, $lname, $grade, $phoneNum, $address, 
            $email, $start_date, $fpclass;

    public function __construct($fname, $lname, $phoneNum, $address) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phoneNum = $phoneNum;
        $this->address = $address;
        
        $this->start_date = date("M Y");
           
        $this->grade = "N/A";
        $this->email = "N/A";  
        $this->fpclass = "N/A";  
        $this->s_id = "N/A";
        $this->case_work ="N/A";
    }

    public function getCaseWorker() {
        return $this->case_work;
    }

    public function setCaseWorker($value) {
        $this->case_work = $value;
    }

    public function getStudentID() {
        return $this->s_id;
    }
    
    public function setStudentID($value) {
        $this->s_ID = $value;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function setGrade($value) {
        $this->grade = $value;
    }

    public function getLastName() {
        return $this->lname;
    }

    public function setLastName($value) {
        $this->lname = $value;
    }
    
    public function getFirstName() {
        return $this->fname;
    }

    public function setFirstName($value) {
        $this->fname = $value;
    }

    public function getPhoneNum() {
        return $phoneNum;
    }

    public function setPhoneNum($value) {
        $this->phoneNum = $value;
    }

    public function getAddress() {
        return $address;
    }

    public function setAddress($value) {
        $this->address = $value;
    }
    
    public function getEmail() {
        return $email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getStartDate() {
        
        return $start_date;
    }

    public function setStartDate($value) {
        $this->start_date = $value;
    }
    
    public function setClass($value) {
        $this->class = $value;
    }
    public function getClass() {   
        return $this->class;
    }

}
?>