<!DOCTYPE HTML>
<html>
<head>
 	<title>First Place</title>
	<link rel="stylesheet" type="text/css" href="/FirstPlace/website/style.css"/>
        <script language="javascript" src="../calendar/calendar.js"></script>
</head>

<body>
<div id="wrapper">
	<!--header -->
	<header>			
		<div id="header">
			<h1 id="logo-text"><a href="/FirstPlace/website/index.php" title="">First Place</a></h1>		
			<p id="slogan">"Hope, Home, and Education for every child, one family at a time"</p>	
		</div>
		<div id="top-menu">
			<p><a href="index.php">Login</a> | <a href="/FirstPlace/website/user_profile/user_profile.php">User Profile</a> | <a href="index.php">Help</a></p>
		</div>			
				
	<!--header ends-->					
	</header>
	<!-- <header><img src="images/header.jpg" /></header> -->
	<nav>
		<ul id="main_nav">
			<ul>
				<li><a href="#">Admin</a>
					<ul>
						<li><a href="/FirstPlace/website/admin/?action=show_add_employee_form">Users Management</a></li>
						<li><a href="/FirstPlace/website/roles_mgmt/?action=show_add_role_form">Roles Management</a></li>
						<li><a href="/FirstPlace/website/rooms_mgmt/?action=show_add_room_form">Rooms Management</a></li>
						<li><a href="/FirstPlace/website/specialty_mgmt/?action=show_add_specialty_form">Specialty Management</a></li>
						<li><a href="/FirstPlace/website/school_year_mgmt/?action=show_add_schoolYear_form">School Year Management</a></li>
						<li><a href="/FirstPlace/website/school_year_mgmt/?action=show_add_standardClass_form">Standard Classes Management</a></li>
						<li><a href="/FirstPlace/website/admin/view_logs.php">View Logs</a></li>
					</ul>
				</li>
				<li><a href="#">Students</a>
					<ul>
						<li><a href="/FirstPlace/website/student/?action=show_add_student_form">Student Management</a></li>                                            
					</ul>
				</li>
				<li><a href="#">Classes</a>
					<ul>
						<li><a href="/FirstPlace/website/class/?action=show_add_class_form">Class Management</a></li>
						
					</ul>
				</li>
				<li><a href="#">Attendance</a>
					<ul>
						<li><a href="/FirstPlace/website/attendance_take/?action=take_attendance">Take Attendance</a></li>
						<li><a href="/FirstPlace/website/attendance_view/?action=view_attendance">View Attendance</a></li>
						<li><a href="/FirstPlace/website/attendance_mgmt/?action=show_add_attendance_type">Attendance types Management</a></li>
					</ul>
				</li>
				<li><a href="/FirstPlace/website/notification/view_notification.php">Notifications</a>
			</ul>
		</ul>
	</nav>
