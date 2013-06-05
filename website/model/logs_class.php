<?php
class Logs {
    private  $log_id, $log_Date, $emp_id, $log_type_id, $st_id, $emp_lname, $emp_fname, $st_lname, $st_fname, $att_old, $att_new;

    public function __construct($log_id, $log_Date, $emp_id, $st_id, $st_fname, $st_lname, $att_old, $att_new, $log_type_id) {
                $this->log_id = $log_id;
		$this->log_Date = $log_Date;		
		$this->emp_id = $emp_id;
		$this->log_type_id = $log_type_id;  
                $this->st_id = $st_id;
                $this->st_fname = $st_fname;
                $this->st_lname = $st_lname;
                $this->att_new = $att_new;
                $this->att_old = $att_old;           
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
    
    public function getEmpLname() {
        return $this->emp_lname;
    }
    
    public function setEmpLname($value){
        $this->emp_lname = $value;
    }
    
    public function getEmpFname() {
        return $this->emp_fname;
    }
    
    public function setEmpFname($value){
        $this->emp_fname = $value;
    }
	
    public function getLog_type_id() {
        return $this->log_type_id;
    }
	
	public function getAtt_id() {
        return $this->att_id;
    }
    
    public function setSt_id($value){
        $this->st_id=$value;
    }
   
    public function getStLname() {
        return $this->st_lname;
    }
    
    public function getStFname() {
        return $this->st_fname;
    }
    
    public function getOldAtt() {
        return $this->att_old;
    }
    
    public function getnewAtt() {
        return $this->att_new;
    }
}
?>