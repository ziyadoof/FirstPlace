<?php
class Logs {
    private  $log_id, $log_Date, $emp_id, $log_type_id, $att_id;

    public function __construct($log_id, $log_Date, $emp_id, $log_type_id, $att_id) {
        $this->log_id = $log_id;
		$this->log_Date = $log_Date;		
		$this->emp_id = $emp_id;
		$this->log_type_id = $log_type_id;
		$this->att_id = $att_id;
		
        
    }

    public function getLog_id() {
        return $this->log_id;
    }

    
    public function getLog_Date() {
        return $this->log_Date;
    }
	
	public function getEmp_id() {
        return $this->emp_id;
    }
	
	public function getLog_type_id() {
        return $this->log_type_id;
    }
	
	public function getAtt_id() {
        return $this->att_id;
    }
   
    
}
?>