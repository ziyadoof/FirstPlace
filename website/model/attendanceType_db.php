<?php
class AttendanceTypeDB {
    public static function getAttendanceType($attTypeID) {
        $db = Database::getDB();
		
		//This is a view
        $query = "SELECT * FROM attendance_type
                  WHERE att_Ty_ID ='$attTypeID'";
        $result = $db->query($query);
		
        $row = $result->fetch();
		$attType = new AttendanceType($row['att_Ty_ID'],
						$row['att_Ty_Name']);
		
		return $attType; 
    }
	
    public static function getAttendanceTypes() {
        $db = Database::getDB();
		
		//This is a view
        $query = 'SELECT * FROM attendance_type
                  ORDER BY att_Ty_Name';
        $result = $db->query($query);
        $AttTypes = array();
        foreach ($result as $row) {
            $AttType = new AttendanceType($row['att_Ty_ID'],
                             $row['att_Ty_Name']);
            $AttTypes[] = $AttType;
        }
        return $AttTypes;
    }
	
    public static function addAttendanceType($AttType) {
	
		$db = Database::getDB();
		
		$attTypeName = $AttType->getAttType_Name();
		
		$query =
			"INSERT INTO attendance_type
				(att_Ty_Name)
			VALUES
				('$attTypeName')";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
	
	public static function updateAttendanceType($attType) {
		$db = Database::getDB();
		
		$attTypeID = $attType->getAttType_id();
		$attTypeName = $attType->getAttType_Name();
	
		$query = 
			"UPDATE attendance_type
			SET att_Ty_Name = '$attTypeName'
			WHERE att_Ty_ID = '$attTypeID'";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
}
?>