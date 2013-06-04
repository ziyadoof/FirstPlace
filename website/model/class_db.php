<?php
class ClassDB {
    public static function getClasses() {
       $db = Database::getDB();
	   
	   $query = 'select * from class';
	   
	   //Get the results into array
		$result = $db->query($query);
		$classes = array();
		foreach ($result as $row) {
            $class = new ClassFP($row['c_id'],
								$row['stdC_id'],
								$row['Room_Room_ID'],
								$row['SchoolYear_sy_id'],
								$row['Employee_emp_id']);
									
			$classes[] = $class;
        }
        return $classes;
    }
    
     public static function getClassByStudent($class_id) {
         $db = Database::getDB();
        
		$query = "SELECT * FROM Class
                  WHERE c_id = '$class_id'";
        $result = $db->query($query);
        $row = $result->fetch();
		
		$class = new ClassFP($row['Grade'],
									$row['Room'],
									$row['SchoolYear'],
									$row['Teacher']);
									
			
        return $class;
    }
    
    
     public static function addClass($class) {
        $db = Database::getDB();

		$grade = $class->getStdC_id();
		$classroom = $class->getRoom_id();
		$term = $class->getSchoolYear_id();
				
		$addClassQuery =
			 "INSERT INTO class
				 (SchoolYear_sy_id, Room_Room_Id, stdC_id)
			 VALUES
				 ('$term', '$classroom', '$grade')";
		
		//Check if the room was specified by the user or not
		$row_count = $db->exec($addClassQuery);

        return $row_count;
    }
	
	public static function updateClass($student) {
       //TODO
        return $row_count;
    }
}
?>