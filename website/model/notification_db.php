<?php
class NotificationDB {
    public static function getNotifs() {
       $db = Database::getDB();
        
		$query = 'select * from notification_view'; //This is a view
		
		//Get the results into array
		$result = $db->query($query);
		$notifs = array();
		foreach ($result as $row) {
            $notif = new Notification($row['not_id'],
                        $row['not_Date'],
			$row['emp_id'],
                        $row['st_id'],
                        $row['st_firstname'],
                        $row['st_lastname'],
                        $row['att_ty_id']);
                        
            $notif->setCW_Fname($row['emp_firstname']);
            $notif->setCW_Lname($row['emp_lastname']);       
         
                  $notifs[] = $notif;
                }
                
                return $notifs;   
    }
    
    
    public static function getNotf_id($notf_id) {
       //TODO
        
    }
    
     public static function getNotf_idByCaseWorker($notf_id, $caseWorker_id) {
         //TODO
        
    }
    
	public static function getNotf_idByDate($notf_id, $notf_date) {
         //TODO
        
    }
		
	}
?>