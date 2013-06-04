<?php
class Student {
    private $s_id, $case_work, $fname, $lname, $grade, $phoneNum, $address, $email, $start_date, $fpclass;

    public function __construct($fname, $lname, $address, $phone) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phoneNum = $phone;
        $this->address = $address;
        $this->grade = "N/A";
        $this->email = "N/A";  
        $this->fpclass = "N/A";  
        $this->s_id = "N/A";
        $this->case_work = 0;
        $this->start_date = 2012;
          
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
        $this->s_id = $value;
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
    
    public function getPhonenum() {
        return $this->phoneNum;
    }

    public function setPhoneNum($value) {
        $this->phoneNum = $value;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($value) {
        $this->address = $value;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getStartDate() {
        
        return $this->start_date;
    }

    public function setStartDate($value) {
        $this->start_date = $value;
    }
    
    public function setClass($value) {
        $this->fpclass = $value;
    }
    
    public function getClass() {
        
        return $this->fpclass;
    }
    
    

}
?>