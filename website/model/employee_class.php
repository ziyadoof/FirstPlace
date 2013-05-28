<?php
class Employee {
    private $emp_id, $fname, $lname, $grade, $phoneNum, $address, 
            $email, $start_year;

    public function __construct($fname, $lname, $phoneNum, 
            $address) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phoneNum = $phoneNum;
        $this->address = $address;
        
        $this->start_year = date("M Y");
        
        $this->grade = "N/A";
        $this->email = "N/A";       
    }

    public function getID() {
        return $this->emp_id;
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

    public function getPrice() {
        return $this->price;
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

    public function getStart_Year() {
        
        return $start_year;
    }

}
?>