<?php
class AdminRole {
    private  $admin_id, $emp_id;

    public function __construct($admin_id, $emp_id) {
        $this->admin_id = $admin_id;
				
		$this->emp_id = $emp_id;
		
        
    }

    public function getAdmin_id() {
        return $this->admin_id;
    }

    
    public function getEmp_id() {
        return $this->emp_id;
    }

    
    
}
?>