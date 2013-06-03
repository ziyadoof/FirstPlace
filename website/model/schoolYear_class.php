<?php
class SchoolYear {
    private $sy_id, $name, $startDate, $endDate;

    public function __construct( $sy_id, $name) {
        $this->sy_id = $sy_id;		
        $this->name = $name;
    }

    public function getSy_id() {
        return $this->sy_id;
    }

    
        
    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }

    
    public function getStartDate() {
        return $this->startDate;
    }

	public function setStartDate($value) {
        $this->startDate = $value;
    }
	
	public function getEndDate() {
        return $this->endDate;
    }

	public function setEndDate($value) {
        $this->endDate = $value;
    }
    
}
?>