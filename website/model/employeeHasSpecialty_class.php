<?php
class EmployeeHasSpecialty {
    private  $emp_id, $specialty_id, $S_StartDate, $S_EndDate, $SpeType, $SpeName;

    public function __construct($emp_id, $specialty_id, $S_StartDate) {
        $this->emp_id = $emp_id;	
		$this->specialty_id = $specialty_id;   
		$this->S_StartDate = $S_StartDate;
    }

    public function getEmp_id() {
        return $this->emp_id;
    }

    public function getSpecialty_id() {
        return $this->specialty_id;
    }
    public function getSpecialtyStartDate() {
        return $this->S_StartDate;
    }
	
	public function setSpecialtyEndDate($value) {
        $this->S_EndDate = $value;
    }
	
    public function getSpecialtyEndDate() {
        return $this->S_EndDate;
    }
	public function setSpecialtyType($value) {
        $this->SpeType = $value;
    }
	
    public function getSpecialtyType() {
        return $this->SpeType;
    }
	public function setSpecialtyName($value) {
        $this->SpeName = $value;
    }
	
    public function getSpecialtyName() {
        return $this->SpeName;
    }
}
?>