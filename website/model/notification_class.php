<?php
class Notification {
    private  $notf_id, $caseWorker_id, $stud_id, $notf_date, $cw_Fname, $cw_Lname, $att_id, $st_Lname, $st_Fname;

    public function __construct($notf_id, $notf_date, $caseWorker_id, $stud_id, $st_Lname, $st_Fname, $att_id) {
                $this->notf_id = $notf_id;
		$this->caseWorker_id = $caseWorker_id;		
		$this->stud_id = $stud_id;
		$this->notf_date = $notf_date;
                $this->att_id = $att_id;
                $this->st_Lname = $st_Lname;
                $this->st_Fname = $st_Fname;
    }

    public function getNotf_id() {
        return $this->notf_id;
    }

    
    public function getStud_id() {
        return $this->stud_id;
    }

    public function getCaseWorker_id() {
        return $this->caseWorker_id;
    }
    
    public function getCW_Fname() {
        return $this->cw_Fname;
    }
    
    public function getCW_Lname() {
        return $this->cw_Lname;
    }
    
    public function setCW_Lname($value){
        $this->cw_Lname = $value;
    }

    public function setCW_Fname($value){
        $this->cw_Fname = $value;
    }
    
    public function getNotf_date() {
        return $this->notf_date;
    }

    public function getAtt() {
        return $this->att_id;
    }
        
}
?>