<?php
class Holiday {
    private $holi_id, $schoolYear_id, $name, $startDate, $endDate;

    public function __construct($holi_id, $schoolYear_id, $startDate, $endDate) {
        $this->holi_id = $holi_id;
		$this->schoolYear_id = $schoolYear_id;
        $this->startDate = $startDate;
		$this->endDate = $endDate;
		
        $this->name = "Holiday";
		
        
    }

    public function getHoli_id() {
        return $this->holi_id;
    }

    
    public function getSchoolYear_id() {
        return $this->schoolYear_id;
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