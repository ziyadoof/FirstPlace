<?php
class ClassDB {
    public static function getClasses() {
       $db = Database::getDB();
	   
	   $query = 'select * from class';
	   
	   //Get the results into array
		$result = $db->query($query);
		$classes = array();
		foreach ($result as $row) {
            $class = new ClassFP($row['stdC_id'],
								$row['Room_Room_ID'],
								$row['SchoolYear_sy_id'],
								$row['Employee_emp_id']);								
			$class->setC_id($row['c_id']);
			
			$classes[] = $class;
        }
        return $classes;
    }    
    
	public static function addClass($class) {
		$db = Database::getDB();

		$stdClass = $class->getStdC_id();
		$room = $class->getRoom_id();
		$term = $class->getSchoolYear_id();
		$employee = $class->getEmp_id();
		
		$addClassQuery =
			 "INSERT INTO class
				 (stdC_id, Room_room_id, SchoolYear_sy_id, employee_emp_id)
			 VALUES
				 ('$stdClass', '$room', '$term', '$employee')";
		
		
		$row_count = $db->exec($addClassQuery);

		return $row_count;
	}
	
	public static function updateClass($c_id) {
		$db = Database::getDB();
		
		$stdClass = $class->getStdC_id();
		$room = $class->getRoom_id();
		$term = $class->getSchoolYear_id();
		$employee = $class->getEmp_id();	
		
		$updateClassquery = 
				"UPDATE class
				SET 
					stdC_id = '$stdClass' ,
					Room_room_id = '$room' ,
					SchoolYear_sy_id =  '$lastname',
					employee_emp_id = '$employee' ,
					
				WHERE c_id = '$c_id'";
				
		$row_count = $db->exec($updateClassQuery);		
				
		return $row_count;
	}
	
	public static function deleteClass($c_id) {
	   $db = Database::getDB();
	   
	   $query = "DELETE FROM class WHERE c_id = '$c_id' ";
	   
	   $row_count = $db->exec($query);
	   return $row_count;
	}
}
?>