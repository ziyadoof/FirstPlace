<?php
class Specialty {
    private  $specialty_id, $type, $name, start_date, $end_date;

    public function __construct($specialty_id, $type, $name, $start_date, $end_date) {
        $this->specialty_id = $specialty_id;
		$this->type = $type;		
		$this->name = $name;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
        
    }

    public function getSpecialty_id() {
        return $this->specialty_id;
    }

    
    public function getType() {
        return $this->type;
    }

    public function getName() {
        return $this->name;
    }
	
	public function getStart_date() {
        return $this->start_date;
    }
	
	public function getEnd_date() {
        return $this->end_date;
    }

    
    
}
?>