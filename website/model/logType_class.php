<?php
class LogType {
    private  $log_ty_id, $log_ty_name;

    public function __construct( $log_ty_id, $log_ty_name) {
        $this->log_ty_id = $log_ty_id;
		$this->log_ty_name = $log_ty_name;
		
        
    }

    public function getLog_ty_id() {
        return $this->log_ty_id;
    }

    
    public function getLog_ty_name() {
        return $this->log_ty_name;
    }

    
    
}
?>