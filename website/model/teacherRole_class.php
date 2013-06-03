<?php
class TeacherRole {
    private $emp_id, $role_id, $firstname, $lastname;

    public function __construct($emp_id, $lastname, $firstname) {
        $this->emp_id = $emp_id;		
        $this->lastname = $lastname;
        $this->firstname = $firstname;
    }

    public function getEmployee_id() {
        return $this->emp_id;
    }

    public function getRole_id() {
        return $this->role_id;
    }    

	public function getFirstName() {
        return $this->firstname;
    }    

	public function setFirstName($value) {
        $this->firstname = $value;
    }    
	
	public function getLastName() {
        return $this->lastname;
    }    

	public function setLastName($value) {
        $this->lastname = $value;
    }    
}
?>