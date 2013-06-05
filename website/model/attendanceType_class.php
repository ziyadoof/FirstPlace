<?php
class AttendanceType {
    private  $att_id, $attName;

    public function __construct($att_id, $attName) {
        $this->att_id = $att_id;
		$this->attName = $attName;  
    }

    public function getAttType_id() {
        return $this->att_id;
    }

    
    public function getAttType_Name() {
        return $this->attName;
    }

    public function setAttType_Name($value) {
        $this->attName = $value;
    }
}
?>