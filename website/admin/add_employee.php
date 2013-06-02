<?php include '../view/header.php'; ?>

<div id="content">

	<h1>User Management</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_employee" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='10' class='tableTitle'>Create employee new user</th>
			</tr>
 			<tr>
 				<th>*First Name</th>
				<th>*Last Name</th>
				<th>Phone Numebr</th>
				<th>Address</th>
				<th>*Email</th>
				<th>Class Room</th>
 				<th>*Username</th>
 				<th>*Password</th>
				<th>*Role ID</th>
				<th>Action</th>
  			</tr>
 			<tr>
				
 				<td><input type='text' name='firstName_new' required /></td>
		 		<td><input type='text' name='lastName_new' required /></td>
				<td><input type='text' name='phoneNumber_new'  /></td>
				<td><input type='text' name='address_new' /></td>
		   		<td><input type='email' name='email_new' required /></td>
	 			<td>
				    <select name="classRoom_new">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>">
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input type='text' name='username_new' required /></td>
	 			<td><input type='password' name='password_new' required /></td>
		 		<td>
					<select name='roleID_new'>
						<option value="a">Admin</option><option value="t">Teacher</option><option value="c">Case Worker</option>
					</select>
				</td>
  				<td colspan='2' id='formButtons'>
			  		<input type='submit' value="Add User" />
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='8' class='tableTitle'>Employee List</th>
		</tr>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Room</th>
			<th>Phone #</th>
			<th>Address</th>
			<th>Role ID</th>
			<th>Action</th>
		</tr>
		<?php foreach ($employees as $employee) : ?>
		<tr>
			<td><?php echo $employee->getFirstName(); ?></td>
			<td><?php echo $employee->getLastName(); ?></td>
			<td><?php echo $employee->getEmail(); ?></td>
			<td><?php echo $employee->getRoom(); ?></td>
			<td><?php echo $employee->getPhoneNum(); ?></td>
			<td><?php echo $employee->getAddress(); ?></td>
			<td><?php $empTtype = $employee->getEmployeeType();
				if ( $empTtype == "t"){
					echo "Teacher";
				} elseif ( $empTtype == "a") {
					echo "Admin";
				} else {
					echo "Case Worker";
				}
			?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_employee" />
					<input type="hidden" name="employee_id" value="<?php echo $employee->getEmployeeID(); ?>" />
                    <input type="submit" value="Edit" />
                </form>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="delete_employee" />
					<input type="hidden" name="employee_id" value="<?php echo $employee->getEmployeeID(); ?>" />
                    <input type="submit" value="Delete" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
	
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>