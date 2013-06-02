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

    public static function getRoomByClass($room_id) {
       //TODO
        
    }
    
     public static function getRoomByStudent($room_id) {
        //TODO
        
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
	
	public static function updateRoom($room_id) {
       //TODO
        
    }
}
?>