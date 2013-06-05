<?php
class StudentHasClassDB {

    public static function getStudentHasClass() {
        $db = Database::getDB();
		
		//This is a view
        $query = 'SELECT * FROM ViewStudentHasClass_byClass
                  ORDER BY Student_s_id';
        $result = $db->query($query);
        $StudentHasClasses = array();
        foreach ($result as $row) {
            $stuHclass = new StudentHasClass($row['Student_ID'],
                             $row['Class_ID']);
            $StudentHasClasses[] = $stuHclass;
        }
        return $StudentHasClasses;     
    }

	public static function getStudentHasClassByClass() {
        $db = Database::getDB();
		
		//This is a view
        $query = 'SELECT * FROM ViewStudentHasClass_byClass
                  ORDER BY Class_c_id';
        $result = $db->query($query);
        $StudentHasClasses = array();
        foreach ($result as $row) {
            $stuHclass = new StudentHasClass($row['Student_ID'],
                             $row['Class_ID']);
            $StudentHasClasses[] = $stuHclass;
        }
        return $StudentHasClasses;     
    }

	public static function addStudentToClass($student_id, $class_id) {
        $db = Database::getDB();
		
		//This is a view
        $query = "INSERT INTO student_has_class values
					('$student_id', '$class_id')";
					
		$row_count = $db->exec($query);

		return $row_count;
    }

	public static function removeStudentFromClass($student_id, $class_id) {
        $db = Database::getDB();
		
		//This is a view
        $query = "DELETE FROM student_has_class WHERE
					Student_s_id = '$student_id' AND Class_c_id = '$class_id'";
					
		$row_count = $db->exec($query);

		return $row_count;   
    }	
}
?>