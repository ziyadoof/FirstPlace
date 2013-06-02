<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit Student Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_student" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='8' class='tableTitle'>Student Information</th>
			</tr>
 			<tr>
 				<th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Grade</th>
                                <th>Case Worker</th>
                                <th>Class</th>
                                <th>Start Date</th>
			</tr>
 			<tr>
				
 				<td><input type='text' name='firstName_cuurent' value="<?php echo $student->getFirstName(); ?>" required /></td>
		 		<td><input type='text' name='lastName_cuurent' value="<?php echo $student->getLastName(); ?>" required /></td>
				<td><input type='text' name='phoneNumber_cuurent' value="<?php echo $student->getPhoneNum(); ?>"  /></td>
				<td><input type='text' name='address_cuurent' value="<?php echo $student->getAddress(); ?>" /></td>
		   		<td><input type='email' name='email_cuurent' value="<?php echo $student->getEmail(); ?>" required /></td>
	 			<td>
				    <select name="grade_cuurent">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($student->getRoom() == $room->getLocation()) { echo "selected";}?>>
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
	 			<td>
				    <select name="casework_cuurent">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($student->getRoom() == $room->getLocation()) { echo "selected";}?>>
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>                                
                		<td>
				    <select name="class_cuurent">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($student->getRoom() == $room->getLocation()) { echo "selected";}?>>
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
                		<td colspan='2' id='formButtons'>
					<input type='hidden'  name='stID_cuurent' value="<?php echo $student->getStudentID(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>