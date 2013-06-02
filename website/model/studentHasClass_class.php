<?php
class StudentHasClass {
    private  $s_id, $c_id;

    public function __construct($s_id, $c_id) {
        $this->s_id = $s_id;
	$this->c_id = $c_id;     
    }

    public function getStudent_id() {
        return $this->s_id;
    }

    
    public function getClass_id() {
        return $this->c_id;
    }     
    
}
?>