<?php
class StudentHasClassDB {

    public static function getStudentHasClass() {
        $db = Database::getDB();
		
		//This is a view
        $query = 'SELECT * FROM viewstudenthasclass
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
        $query = 'SELECT * FROM viewstudenthasclass
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
}
?>