<?php
class Class {
    private $c_id, $schoolYear_id, $room_id, $stdC_id, $name, $start_time, $end_time;

    public function __construct($c_id, $schoolYear_id, $room_id, $stdC_id, $name) {
        $this->c_id = $c_id;
		$this->schoolYear_id = $schoolYear_id;
        $this->room_id = $room_id;
		$this->stdC_id = $stdC_id;
        $this->name = $name;
		
		$this->start_time = "8:00 am";
		$this->end_time = "2:00 pm";
        
    }

    public function getC_id() {
        return $this->c_id;
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
    
}
?>