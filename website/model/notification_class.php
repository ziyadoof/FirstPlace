<?php
class Notification {
    private  $notf_id, $caseWorker_id, $stud_id, $notf_date;

    public function __construct($notf_id, $caseWorker_id, $stud_id, $notf_date) {
        $this->notf_id = $notf_id;
		$this->caseWorker_id = $caseWorker_id;		
		$this->stud_id = $stud_id;
		$this->notf_date = $notf_date;
		
        
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
	
	public function getNotf_date() {
        return $this->notf_date;
    }

        
}
?>