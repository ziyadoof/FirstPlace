<?php
class Room {
    private  $room_id, $location;

    public function __construct($room_id, $location) {
        $this->room_id = $room_id;
				
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
	
	public function getRoomName() {
        return $this->location."-". $this->room_id;
    }
	

    
    
}
?>