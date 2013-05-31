<?php
class TeacherRoleHasClass {
    private  $teach_id, $class_id;

    public function __construct($teach_id, $class_id) {
        $this->teach_id = $teach_id;
				
		$this->class_id = $class_id;
		
        
    }

    public function getTeach_id() {
        return $this->teach_id;
    }

    
    public function getClass_id() {
        return $this->class_id;
    }

       
    
}
?>