<?php
class SchoolYear {
    private $sy_id, $name, $startDate, $endDate;

    public function __construct( $schoolYear_id, $startDate, $endDate) {
        $this->sy_id = $schoolYear_id;
        $this->startDate = $startDate;
		$this->endDate = $endDate;
		
        $this->name = "Not Specified";
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