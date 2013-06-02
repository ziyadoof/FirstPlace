<?php include '../view/header.php'; ?>

<div id="content">
    <h1>Students</h1>
       <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_student" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='10' class='tableTitle'>Create New Student</th>
			</tr>
 			<tr>
 				<th>*First Name</th>
				<th>*Last Name</th>
				<th>*Phone Number</th>
				<th>*Address</th>
				<th>Email</th>
				<th>Grade</th>
 				<th>Case Worker</th>
                                <th>Class</th>
                                <th>Year Started</th>
 				<th>Action</th>
  			</tr>
 			<tr>
				
 				<td><input type='text' name='firstName_new' required /></td>
		 		<td><input type='text' name='lastName_new' required /></td>
				<td><input type='text' name='phoneNumber_new'  /></td>
				<td><input type='text' name='address_new' /></td>
		   		<td><input type='email' name='email_new' required /></td>
	 			<td>
				    <select name="grade_new">
						<option value="NotSpecified">No Grade</option>
						<option value="1st">1st</option>
                                                <option value="2nd">2nd</option>
                                                <option value="3th">3th</option>
                                                <option value="4th">4th</option>
                                                <option value="5th">5th</option>
                                                <option value="6th">6th</option>
					</select>
				</td>
				<td><input type='grade' name='grade_new' required /></td>
	 			<td>
				    <select name="casework_new">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>">
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
                                <td>
				    <select name="class_new">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>">
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
                                <td><input type='year' name='year_new' required /></td>
                                <td>
					<select name='roleID_new'>
						<option value="a">Admin</option><option value="t">Teacher</option><option value="c">Case Worker</option>
					</select>
				</td>
  				<td colspan='2' id='formButtons'>
			  		<input type='submit' value="Add Student" />
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='8' class='tableTitle'>Student List</th>
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
			<th>Action</th>
		</tr>
		<?php foreach ($students as $student) : ?>
		<tr>
			<td><?php echo $student->getFirstName(); ?></td>
			<td><?php echo $student->getLastName(); ?></td>
			<td><?php echo $student->getPhoneNum(); ?></td>
			<td><?php echo $student->getAddress(); ?></td>
			<td><?php echo $student->getEmail(); ?></td>
                        <td><?php echo $student->getGrade(); ?></td>
                        <td><?php echo $student->getCaseWorker(); ?></td>
                        <td><?php echo $student->getClass(); ?></td>
			<td><?php echo $student->getStartDate(); ?></td>
                        <td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_student" />
					<input type="hidden" name="student_id" value="<?php echo $student->getEmployeeID(); ?>" />
                    <input type="submit" value="Edit" />
                </form>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="delete_student" />
					<input type="hidden" name="student_id" value="<?php echo $student->getEmployeeID(); ?>" />
                    <input type="submit" value="Delete" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
	
	
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>