<?php
class Room {
    private  $room_id, $location;

    public function __construct($r_id, $location) {
		$this->room_id = $r_id;
		$this->location = $location;   
    }

    public function getRoom_id() {
        return $this->room_id;
    }

    
    public function getLocation() {
        return $this->location;
    }

    public function setLocation($value) {
        $this->location = $value;
    }
}
?>