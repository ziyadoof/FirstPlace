<?php
class StdClass {
    private  $stdClass_id, $className;

    public function __construct($stdClass_id, $className) {
        $this->stdClass_id = $room_id;
				
		$this->className = $className;
		
        
    }

    public function getStdClass_id() {
        return $this->stdClass_id;
    }

    
    public function getClassName() {
        return $this->className;
    }

    public function setClassName($value) {
        $this->className = $value;
    }

    
    
}
?>