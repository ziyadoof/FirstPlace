<?php

class StudentClassesInfo {
    private $s_id, $c_id, $s_FirstName, $s_LastName, $ClassName;

    public function __construct($s_id_value, $c_id_value, $s_FirstName_value, $s_LastName_value, $ClassName_value) {
		$this->s_id = $s_id_value;
        $this->c_id = $c_id_value;
		$this->s_FirstName = $s_FirstName_value;		
		$this->s_LastName = $s_LastName_value;
		$this->ClassName = $ClassName_value;
    }

    public function getStudent_id() {
        return $this->s_id;
    }

    public function getClass_id() {
        return $this->c_id;
    }
	
    public function getStudent_FirstName() {
        return $this->s_FirstName;
    }
	
    public function getStudentLastName() {
        return $this->s_LastName;
    }
	
    public function getClass_Name() {
        return $this->ClassName;
    }

}
?>