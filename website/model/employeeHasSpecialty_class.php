<?php
class EmployeeHasSpecialty {
    private  $emp_id, $specialty_id;

    public function __construct($emp_id, $specialty_id) {
        $this->emp_id = $emp_id;	
		$this->specialty_id = $specialty_id;   
    }

    public function getEmp_id() {
        return $this->emp_id;
    }

    public function getSpecialty_id() {
        return $this->specialty_id;
    }

}
?>