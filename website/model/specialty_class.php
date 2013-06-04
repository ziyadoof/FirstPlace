<?php
class Specialty {
    private  $specialty_id, $type, $name;

    public function __construct($specialty_id, $type, $name) {
        $this->specialty_id = $specialty_id;
		$this->type = $type;		
		$this->name = $name;
        
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
    
}
?>