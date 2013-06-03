<?php
class RoleDB {

    public static function getRoles() {
        $db = Database::getDB();
		
		//This is a view
        $query = 'SELECT * FROM role
                  ORDER BY RoleName';
        $result = $db->query($query);
        $Roles = array();
        foreach ($result as $row) {
            $role = new Role($row['Role_ID'],
                             $row['RoleName']);
            $Roles[] = $role;
        }
        return $Roles;
        
    }
	
	public static function getRole($rID) {
        $db = Database::getDB();
		
		//This is a view
        $query = "SELECT * FROM role
                  WHERE Role_ID ='$rID'";
        $result = $db->query($query);
		
        $row = $result->fetch();
		$role = new Role($row['Role_ID'],
						$row['RoleName']);
		return $role;   
    }
	
	
    
    
    public static function addRole($roleRow) {
		$db = Database::getDB();
		
		$newRoleName = $roleRow->getRoleName();
		
		$query =
			"INSERT INTO role
				(RoleName)
			VALUES
				('$newRoleName')";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
	
	public static function updateRole($thisRole) {
		
		$db = Database::getDB();
		
		$rID = $thisRole->getRole_id();
		$newRoleName = $thisRole->getRoleName();
	
		$query = 
			"UPDATE role
			SET RoleName = '$newRoleName'
			WHERE Role_ID = '$rID'";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
}
?>