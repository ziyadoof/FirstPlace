<?php
class StdHasClass {
    private  $s_id, $c_id;

    public function __construct($stdClass_id, $c_id) {
        $this->s_id = $s_id;
		$this->c_id = $c_id;
		
        
    }

    public function getS_id() {
        return $this->s_id;
    }

    
    public function getC_id() {
        return $this->c_id;
    }

       
    
}
?>