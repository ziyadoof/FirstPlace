<?php
class ClassHasEmployee {
    private $class_c_id, $employee_emp_id;

    public function __construct($class_c_id, $employee_emp_id) {
		$this->class_c_id = $class_c_id;
        $this->employee_emp_id = $employee_emp_id;
    }

    public function getClass_c_id() {
        return $this->class_c_id;
    }

    public function getEmployee_emp_id() {
        return $this->employee_emp_id;
    }
}
?>