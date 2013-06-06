<?php
class AttendanceDB {
    public static function getAttendance() {
       //TODO
        return $students;
    }
    
    public static function getAttendanceByClassAndDay($class_id, $DayDate) {
		
		$db = Database::getDB();
        
		$query = "SELECT * FROM attendance
                  WHERE Class_ID = '$class_id' AND Att_Date = '$DayDate'";
		
		//Get the results into array
		$result = $db->query($query);
		$ateendences = array();
		foreach ($result as $row) {
            $attend = new AttendanceTable($row['Student_s_id'],
									$row['Class_ID'],
									$row['att_Ty_ID'],
									$row['Att_Date']);
			$attend->setAttComment($row['Comment']);
			
            $ateendences[] = $attend;
        }
		return $ateendences;
    }
    
    
    public static function getAttendanceByStudent($s_id) {
        //TODO
        return $student;
    }
	
    public static function getAttendanceFullInfoByClassAndDay($class_id, $DayDate) {
		$db = Database::getDB();
        
		$query = "SELECT * FROM ViewAttendanceInfo
                  WHERE Class_ID = '$class_id' AND Att_Date = '$DayDate' ORDER BY FirstName";
		
		//Get the results into array
		$result = $db->query($query);
		$ateendences = array();
		foreach ($result as $row) {
            $attend = new AttendanceInfo($row['Student_s_id'],
									$row['Class_ID'],
									$row['att_Ty_ID'],
									$row['Att_Date'],
									$row['Comment'],
									$row['att_Ty_Name'],
									$row['FirstName'],
									$row['LastName']);
			
            $ateendences[] = $attend;
        }
		return $ateendences;
    }

    public static function addManyAttendance($atthendances) {
        
		$db = Database::getDB();

		foreach ($atthendances as $row) {
				$std_id = $row->getAtt_student_id();   //this is a variable of AttendanceTable Type
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
	
    public static function updateAttendance($AttRow){
		$db = Database::getDB();
		
		$std_id = $AttRow->getAtt_student_id();
		$cls_id = $AttRow->getAtt_class_id();
		$att_type_id = $AttRow->getAtt_type_id();
		$att_current_date = $AttRow->getAtt_date();
		$att_comment = $AttRow->getAttComment();
	
		$query = 
			"UPDATE attendance
			SET att_Ty_ID = '$att_type_id' , 
				Comment = '$att_comment'
			WHERE Student_s_id = '$std_id' AND Class_ID = '$cls_id' AND Att_Date = '$att_current_date'";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
}
?>