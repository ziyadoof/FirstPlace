<?php
class ClassFP {
    private $c_id, $schoolYear_id, $room_id, $stdC_id, $name, $start_time, $end_time, $schoolYear, $grade, $teacher, $room;

    public function __construct($stdC_id, $room_id, $schoolYear_id) {
		$this->schoolYear_id = $schoolYear_id;
        $this->room_id = $room_id;
		$this->stdC_id = $stdC_id;
		
		$this->start_time = "8:00 am";
		$this->end_time = "2:00 pm";
    }

    public function getC_id() {
        return $this->c_id;
    }

    public function setC_id($value) {
        $this->c_id = $value;
    }
    
    public function getSchoolYear_id() {
        return $this->schoolYear_id;
    }

    
    public function getRoom_id() {
        return $this->room_id;
    }

    
    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }

    public function getStdC_id() {
        return $this->stdC_id;
    }
	
	
    public function getStart_time() {
        return $this->start_time;
    }

	public function setStart_time($value) {
        $this->start_time = $value;
    }
	
	public function getEnd_time() {
        return $this->end_time;
    }

	public function setEnd_time($value) {
        $this->end_time = $value;
    }
	
	public function getSchoolYear() {   
        return $this->schoolYear;
    }
    
    public function setSchoolYear($value) {
        $this->schoolYear = $value;
    }
    
	public function getGrade() {   
        return $this->grade;
    }
    
    public function setGrade($value) {
        $this->grade = $value;
    }
	
	public function getTeacher() {   
        return $this->teacher;
    }
    
    public function setTeacher($value) {
        $this->teacher = $value;
}

	public function getRoom() {   
        return $this->room;
    }
    
    public function setRoom($value) {
        $this->room = $value;
	}
}
?>