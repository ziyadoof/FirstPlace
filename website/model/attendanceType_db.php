<?php
class AttendanceTypeDB {
    public static function getAttendanceType() {
       //TODO
        return $students;
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
	
    public static function addAttendance($student) {
       //TODO
        return $row_count;
    }
	
	public static function updateAttendance($student) {
       //TODO
        return $row_count;
    }
}
?>