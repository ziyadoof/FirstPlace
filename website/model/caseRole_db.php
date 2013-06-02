<?php
class CaseRoleDB {
    public static function getCaseWorker_id($caseWorker_id) {
       //TODO
        
    }
    
    public static function deleteCaseWorker_id($caseWorker_id) {
         //TODO
        
    }
    
        public static function addCaseWorker_id($caseWorker_id) {
       //TODO
        
    }
	
	public static function updateCaseWorker_id($caseWorker_id) {
       //TODO
        
    }
	
	public static function deleteCaseWorkerByEmpID($employee_id) {
	   $db = Database::getDB();
	   
	   $query = "DELETE FROM case_role WHERE Employee_emp_id = '$employee_id' ";
	   
	   $row_count = $db->exec($query);
	   return $row_count;
	}
	
}
?>