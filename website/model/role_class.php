<?php
class Role {
    private  $Role_ID, $RoleName;

    public function __construct($rID, $rName) {
        
		$this->Role_ID = $rID;
		$this->RoleName = $rName;   
    }

    public function getRole_id() {
        return $this->Role_ID;
    }

    
    public function getRoleName() {
        return $this->RoleName;
    }

    public function setRoleName($value) {
        $this->RoleName = $value;
    }
}
?>