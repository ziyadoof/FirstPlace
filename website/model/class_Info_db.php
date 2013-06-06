<?php
class ClassInfoDB {

	public static function getClassesByYear($TodayDate) {
       $db = Database::getDB();
	   
	   // a view will return c_id, StartTime, EndTime, ClassName, schoolyear.Name, StartDate, EndDate based on Today's Date
	   $query = "SELECT * FROM ViewClassesInYear WHERE EndDate > '$TodayDate'";
	   
	   //Get the results into array
		$result = $db->query($query);
		$classes = array();
		foreach ($result as $row) {
            $class = new ClassInfo($row['c_id'],
								$row['ClassName'],
								$row['Name']);								
			$class->setClassStartTime($row['StartTime']);
			$class->setClassEndTime($row['EndTime']);
			$class->setClassYearStartDate($row['StartDate']);
			$class->setClassYearEndDate($row['EndDate']);
			
			$classes[] = $class;
        }
        return $classes;
	}

	
	public static function getClassByID($ClassID) {
       $db = Database::getDB();
	   
	   // a view will return c_id, StartTime, EndTime, ClassName, schoolyear.Name, StartDate, EndDate based on Class ID
	   $query = "SELECT * FROM ViewClassesInYear WHERE c_id = '$ClassID'";
	   
	   //Get the results into array
		$result = $db->query($query);
		$row = $result->fetch();
	
        $class = new ClassInfo($row['c_id'],
							$row['ClassName'],
							$row['Name']);								
		$class->setClassStartTime($row['StartTime']);
		$class->setClassEndTime($row['EndTime']);
		$class->setClassYearStartDate($row['StartDate']);
		$class->setClassYearEndDate($row['EndDate']);
		
        return $class;
	}
	
	public static function getClassesForStudent($StudentID) {
       $db = Database::getDB();
	   
	   $query = "SELECT * FROM ViewClassesForStudent WHERE s_id = '$StudentID'";
	   
	   //Get the results into array
		$result = $db->query($query);
		$classes = array();
		foreach ($result as $row) {
            $class = new StudentClassesInfo($row['s_id'],
								$row['c_id'],
								$row['FirstName'],
								$row['LastName'],
								$row['ClassName']);								
			$classes[] = $class;
        }
        return $classes;
	}
}
?>