<?php
class ClassFP {
    private $c_id, $stdC_id, $room_id, $schoolYear_id, $emp_id;

    public function __construct($stdC_id, $room_id, $schoolYear_id, $emp_id) {
		$this->stdC_id = $stdC_id;
        $this->room_id = $room_id;
		$this->schoolYear_id = $schoolYear_id;
		$this->emp_id = $emp_id;		
    }

    public function getC_id() {
        return $this->c_id;
    }

    public function setC_id($value) {
        $this->c_id = $value;
    }

    public function getStdC_id() {
        return $this->stdC_id;
    }
	
    public function getRoom_id() {
        return $this->room_id;
    }

    public function getSchoolYear_id() {
        return $this->schoolYear_id;
    }
	
    public function getEmp_id() {
        return $this->emp_id;
    }

    // public function setC_id($value) {
        // $this->c_id = $value;
    // }
    
    
    
    // public function getName() {
        // return $this->name;
    // }

    // public function setName($value) {
        // $this->name = $value;
    // }
	
	
    // public function getStart_time() {
        // return $this->start_time;
    // }

	// public function setStart_time($value) {
        // $this->start_time = $value;
    // }
	
	// public function getEnd_time() {
        // return $this->end_time;
    // }

	// public function setEnd_time($value) {
        // $this->end_time = $value;
    // }
	
	// public function getSchoolYear() {   
        // return $this->schoolYear;
    // }
    
    // public function setSchoolYear($value) {
        // $this->schoolYear = $value;
    // }
    
	// public function getGrade() {   
        // return $this->grade;
    // }
    
    // public function setGrade($value) {
        // $this->grade = $value;
    // }
	
	// public function getTeacher() {   
        // return $this->teacher;
    // }
    
    // public function setTeacher($value) {
        // $this->teacher = $value;
// }

	// public function getRoom() {   
        // return $this->room;
    // }
    
    // public function setRoom($value) {
        // $this->room = $value;
	// }
// }
}
?>