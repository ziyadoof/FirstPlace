<?php
class AdminRoleDB {
    public static function getAdminRole($admin_id) {
       //TODO
        
    }
    
     public static function addAdminRole($admin_id) {
       //TODO
        
    }
	
	public static function updateAdminRole($admin_id) {
       //TODO
        
    }
	public static function deleteAdminRole($admin_id) {
		//TODO
	
	}
	public static function deleteAdminRoleByEmpID($employee_id) {
       
	   $db = Database::getDB();
	   
	   $query = "DELETE FROM admin_role WHERE emp_id = '$employee_id' ";
	   
	   $row_count = $db->exec($query);
	   return $row_count;
    }
}
?>