<?php
class AttendanceDB {
    public static function getAttendance() {
       //TODO
        return $students;
    }
    
     public static function getAttendanceByClass($class_id) {
         //TODO
        return $students;
    }
    
    
    public static function getAttendanceByStudent($s_id) {
        //TODO
        return $student;
    }

    public static function addManyAttendance($atthendances) {
        
		$db = Database::getDB();

		foreach ($atthendances as $row) {
				$std_id = $row->getAtt_student_id();
				$class_id = $row->getAtt_class_id();
				$attType_id = $row->getAtt_type_id();
				$attDate = $row->getAtt_date();
				$attCommentValue = $row->getAttComment();
				
				$query =
					"INSERT INTO attendance
						(Student_s_id, Class_ID, att_Ty_ID, Att_Date, Comment)
					VALUES
						('$std_id', '$class_id', '$attType_id', '$attDate', '$attCommentValue')";
				
				$db->exec($query);
        }
		
    }
}
?>