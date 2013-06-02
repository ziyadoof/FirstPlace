<?php
class TeacherRoleDB {
    public static function getTeach($teach_id) {
       //TODO
        
    }
    
    public static function getTeachByEmployee($teach_id, $emp_id) {
         //TODO
        
    }
    
	    
        public static function addTeach($teach_id) {
       //TODO
        
    }
	
	public static function updateTeach($teach_id) {
       //TODO
        
    }
	
	public static function deleteTeach($teach_id) {
       //TODO
        
    }
	
	public static function addTeachByEmployee($teach_id, $emp_id) {
         //TODO
        
    }
	
	public static function updateTeachByEmployee($teach_id, $emp_id) {
         //TODO
        
    }
	
	public static function deleteTeachByEmployee($employee_id) {
	   $db = Database::getDB();
	   
	   $query = "DELETE FROM teacher_role WHERE Employee_emp_id = '$employee_id' ";
	   
	   $row_count = $db->exec($query);
	   return $row_count;
    }
	
	public static function deleteAdminRoleByEmpID($employee_id) {
       

    }
}
?>