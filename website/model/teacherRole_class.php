<?php
class TeacherRole {
    private  $teach_id, $emp_id;

    public function __construct($teach_id, $emp_id) {
        $this->teach_id = $teach_id;
				
		$this->emp_id = $emp_id;
		
        
    }

    public function getTeach_id() {
        return $this->teach_id;
    }

    
    public function getEmp_id() {
        return $this->emp_id;
    }

    
    
    
}
?>