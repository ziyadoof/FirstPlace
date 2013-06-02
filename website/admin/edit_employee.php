<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit Employee Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_employee" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='8' class='tableTitle'>Employee Infomation</th>
			</tr>
 			<tr>
 				<th>*First Name</th>
				<th>*Last Name</th>
				<th>Phone Numebr</th>
				<th>Address</th>
				<th>*Email</th>
				<th>Class Room</th>
				<th>*Role ID</th>
				<th>Action</th>
  			</tr>
 			<tr>
				
 				<td><input type='text' name='firstName_cuurent' value="<?php echo $employee->getFirstName(); ?>" required /></td>
		 		<td><input type='text' name='lastName_cuurent' value="<?php echo $employee->getLastName(); ?>" required /></td>
				<td><input type='text' name='phoneNumber_cuurent' value="<?php echo $employee->getPhoneNum(); ?>"  /></td>
				<td><input type='text' name='address_cuurent' value="<?php echo $employee->getAddress(); ?>" /></td>
		   		<td><input type='email' name='email_cuurent' value="<?php echo $employee->getEmail(); ?>" required /></td>
	 			<td>
				    <select name="classRoom_cuurent">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($employee->getRoom() == $room->getLocation()) { echo "selected";}?>>
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
		 		<td>
					<select name='roleID_cuurent'>
						<option value="a" <?php if ($employee->getEmployeeType() == 'a') { echo "selected";}?>>Admin</option>
						<option value="t" <?php if ($employee->getEmployeeType() == 't') { echo "selected";}?>>Teacher</option>
						<option value="c" <?php if ($employee->getEmployeeType() == 't') { echo "selected";}?>>Case Worker</option>
					</select>
				</td>
  				<td colspan='2' id='formButtons'>
 					<input type='hidden'  name='form_action' value='create' />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>