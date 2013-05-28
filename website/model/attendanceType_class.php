<?php
class AttendanceType {
    private  $att_id, $attName;

    public function __construct($att_id, $attName) {
        $this->att_id = $att_id;
				
		$this->attName = $attName;
		
        
    }

    public function getAtt_id() {
        return $this->att_id;
    }

    
    public function getAttName() {
        return $this->attName;
    }

    public function setAttName($value) {
        $this->attName = $value;
    }

    
    
}
?>