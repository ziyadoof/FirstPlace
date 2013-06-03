<?php
class StdClass2 {
    private  $stdClass_id, $className;

    public function __construct($stdClass_id, $className) {
        $this->stdClass_id = $stdClass_id;
				
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