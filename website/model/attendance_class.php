<?php
class AttendanceTable {
    private  $student_id, $class_id, $attType_id, $att_date, $attComment;

    public function __construct($student_id_value, $class_id_value, $attType_id_vlaue, $att_date_value) {
        $this->student_id = $student_id_value;
		$this->class_id = $class_id_value;  
        $this->attType_id = $attType_id_vlaue;
		$this->att_date = $att_date_value;
		
		$this->attComment = "No Comments";
    }

    public function getAtt_student_id() {
        return $this->student_id;
    }

    
    public function getAtt_class_id() {
        return $this->class_id;
    }

    public function getAtt_type_id() {
        return $this->attType_id;
    }
	
    public function getAtt_date() {
        return $this->att_date;
    }
	
    public function setAttComment($value) {
        $this->attComment = $value;
    }
	
    public function getAttComment() {
        return $this->attComment;
    }
}
?>