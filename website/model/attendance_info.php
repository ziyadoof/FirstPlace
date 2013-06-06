<?php
class AttendanceInfo {
    private  $student_id, $class_id, $attType_id, $att_date, $attComment, $attTypeName, $s_FirstName, $s_LastName ;

    public function __construct($student_id_value, $class_id_value, $attType_id_vlaue, $att_date_value,
								$attComment_value, $attTypeName_value, $s_FirstName_value, $s_LastName_value) {
        $this->student_id = $student_id_value;
		$this->class_id = $class_id_value;  
        $this->attType_id = $attType_id_vlaue;
		$this->att_date = $att_date_value;
		$this->attComment = $attComment_value;
		$this->attTypeName = $attTypeName_value;  
        $this->s_FirstName = $s_FirstName_value;
		$this->s_LastName = $s_LastName_value;		

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
		
    public function getAttComment() {
        return $this->attComment;
    }
	
    public function getAttTypeName() {
        return $this->attTypeName;
    }
	
    public function getAtt_s_FName() {
        return $this->s_FirstName;
    }
	
	
    public function getAtt_s_LName() {
        return $this->s_LastName;
    }
}
?>