<?php
class RoomDB {

    public static function getRooms() {
        $db = Database::getDB();
		
		//This is a view
        $query = 'SELECT * FROM viewrooms
                  ORDER BY Location';
        $result = $db->query($query);
        $Rooms = array();
        foreach ($result as $row) {
            $room = new Room($row['Room_ID'],
                             $row['Location']);
            $Rooms[] = $room;
        }
        return $Rooms;
        
    }
	
	public static function getRoom($room_id) {
        $db = Database::getDB();
		
		//This is a view
        $query = "SELECT * FROM room
                  WHERE Room_ID ='$room_id'";
        $result = $db->query($query);
		
        $row = $result->fetch();
		$room = new Room($row['Room_ID'],
						$row['Location']);
		
		return $room;   
    }
	
	
    
    
    public static function addRoom($room) {
		$db = Database::getDB();
		
		$roomName = $room->getLocation();
		
		$query =
			"INSERT INTO room
				(Location)
			VALUES
				('$roomName')";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
	
	public static function updateRoom($room) {
		
		$db = Database::getDB();
		
		$room_ID = $room->getRoom_id();
		$roomLocName = $room->getLocation();
	
		$query = 
			"UPDATE room
			SET Location = '$roomLocName'
			WHERE Room_ID = '$room_ID'";
		
		$row_count = $db->exec($query);
        return $row_count;
    }
}
?>