<?php

// index for School Year Managment 

require('../model/mysql_connect.php');
require('../model/notification_class.php');
require('../model/notification_db.php');
require('../model/attendanceType_class.php');
require('../model/attendanceType_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_notif_form';
}

//Get the available rooms then redirect to the add with list form.
if ($action == 'show_notif_form') {             
    
	$notifs = NotificationDB::getNotifs();
        //$attenTys = AttendanceTypeDB::getAttendanceTypes();
       
        include('view_notification.php');

}


?>
