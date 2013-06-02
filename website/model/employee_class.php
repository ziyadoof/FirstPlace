<?php
class Employee {
    private $empID, $fname, $lname, $phoneNum, $address, $email, $usname, $passwd, $room, $employeeType;

    public function __construct($fname, $lname, $email, $usname, $passwd,$room) 
	{
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->usname = $usname;
        $this->passwd = $passwd;
        $this->room = $room;        
        
        $this->phoneNum = "N/A";
        $this->address = "N/A";
		$this->empID = "N/A";
    }
	
    public function getEmployeeID() {
        return $this->empID;
    }

    public function setEmployeeID($value) {
        $this->empID = $value;
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

    public function getUserName() {   
        return $this->usname;
    }
    
    public function getPassword() {   
        return $this->passwd;
    }
    
    public function setPassword($value) {
        $this->passwd = $value;
    }

    public function getRoom() {   
        return $this->room;
    }
    
    public function setRoom($value) {
        $this->room = $value;
    }
    public function getEmployeeType() {   
        return $this->employeeType;
    }
    
    public function setEmployeeType($value) {
        $this->employeeType = $value;
    }

}
?>