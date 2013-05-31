<?php
class CaseRole {
    private  $caseWorker_id, $emp_id;

    public function __construct($caseWorker_id, $emp_id) {
        $this->caseWorker_id = $caseWorker_id;
		$this->emp_id = $emp_id;
		
        
    }

    public function getCaseWorker_id() {
        return $this->caseWorker_id;
    }

    
    public function getEmp_id() {
        return $this->emp_id;
    }

        
}
?>