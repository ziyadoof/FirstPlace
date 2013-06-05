<?php
class ClassInfo {
    private $c_id, $classStartTime, $ClassEndTime, $StanderedClassName, $YearName, $YearStartDate, $YearEndDate;

    public function __construct($C_idValue, $StndrdClassName, $YearNameValue) {
		$this->c_id = $C_idValue;
        $this->StanderedClassName = $StndrdClassName;
		$this->YearName = $YearNameValue;		
    }

    public function getC_id() {
        return $this->c_id;
    }

    public function getStdClassName() {
        return $this->StanderedClassName;
    }
	
    public function getClassYearName() {
        return $this->YearName;
    }
	
    public function setClassStartTime($value) {
        $this->classStartTime = $value;
    }
	
    public function getClassStartTime() {
        return $this->classStartTime;
    }
	
    public function setClassEndTime($value) {
        $this->ClassEndTime = $value;
    }
	
    public function getClassEndTime() {
        return $this->ClassEndTime;
    }
	
    public function setClassYearStartDate($value) {
        $this->YearStartDate = $value;
    }
	
    public function getClassYearStartDate() {
        return $this->YearStartDate;
    }
	
    public function setClassYearEndDate($value) {
        $this->YearEndDate = $value;
    }
	
    public function getClassYearEndDate() {
        return $this->YearEndDate;
    }

}
?>