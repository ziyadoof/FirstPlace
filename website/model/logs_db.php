<?php
class LogsDB {
    public static function getLogs() {
       $db = Database::getDB();
        
		$query = 'select * from logEmployee_view order by log_Date'; //This is a view
		
		//Get the results into array
		$result = $db->query($query);
		$logs = array();
		foreach ($result as $row) {
            $log = new Logs($row['log_id'],
                        $row['log_Date'],
			$row['emp_id'],
                        $row['log_ty_name']);
	
            $logs[] = $log;
                }
                return $logs;
        
    }
    
    public static function getLog($log_id) {
       //TODO
        
    }
    
     public static function getLogsByDate($log_Date) {
         //TODO
        
    }
    
	public static function getLogsByEmpId($emp_id) {
         //TODO
        
    }
	
	public static function getLogsByType($log_type_id) {
         //TODO
        
    }
    
        public static function addLogs($log_id) {
       //TODO
        
    }
	
	public static function addLogsByDate($log_Date) {
         //TODO
        
    }
    
	public static function addLogsByEmpId($emp_id) {
         //TODO
        
    }
	
	public static function addLogsByType($log_type_id) {
         //TODO
        
    }
	
    public static function deleteLogsByDate($log_Date) {
         //TODO
        
    }
    
	public static function deleteLogsByEmpId($emp_id) {
         //TODO
        
    }
	
	public static function deleteLogsByType($log_type_id) {
         //TODO
        
    }
	
	
}
?>