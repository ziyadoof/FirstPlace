<?php
class ClassHasEmployeeDB {
    public static function getClassHasEmployees() {
       $db = Database::getDB();
	   
	   $query = 'select * from class_has_employee';
	   
	   //Get the results into array
		$result = $db->query($query);
		$classes = array();
		foreach ($result as $row) {
            $class = new ClassFP($row['class_c_id'],
									$row['employee_emp_id']);
									
			$classes[] = $class;
        }
        return $classes;
    }
}
?>