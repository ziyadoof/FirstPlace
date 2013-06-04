<?php include '../view/header.php'; 
require('../calendar/classes/tc_calendar.php');
?>

<div id="content">

	<h1>Edit Employee Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_employee" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='9' class='tableTitle'>Employee Information</th>
			</tr>
 			<tr>
 				<th>*First Name</th>
				<th>*Last Name</th>
				<th>Phone Number</th>
				<th>Address</th>
				<th>*Email</th>
				<th>Class Room</th>
				<th>* Role</th>
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
						<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($employee->getRoom() == $room->getRoom_id()) { echo "selected";}?>>
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				<td>
				    <select name="New_RoleID">
						<?php foreach ($roles as $role) : ?>
						<option value="<?php echo $role->getRole_id(); ?>" <?php if ($employee->getRoleID() == $role->getRole_id()) { echo "selected";}?>>
							<?php echo $role->getRoleName(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
  				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='empID_cuurent' value="<?php echo $employee->getEmployeeID(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='5' class='tableTitle'>Specialties Included</th>
		</tr>
		<tr>
			<th>Specialty Type 	</th>
			<th>Specialty Name</th>
			<th>Specialty Start Date</th>
			<th>Specialty End Date</th>
			<th>Action</th>
		</tr>
		<?php foreach ($EmpSpecialtis as $spes) : ?>
		<tr>
			<td><?php echo $spes->getSpecialtyType(); ?></td>
			<td><?php echo $spes->getSpecialtyName(); ?></td>
			<td><?php echo $spes->getSpecialtyStartDate(); ?></td>
			<td><?php echo $spes->getSpecialtyEndDate(); ?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="drop_spes_from_emp" />
					<input type="hidden" name="employee_id" value="<?php echo $employee->getEmployeeID(); ?>" />
					<input type="hidden" name="spes_id" value="<?php echo $spes->getSpecialty_id(); ?>" />
                    <input type="submit" value="Remove from employee profile" />
                </form>			
			</td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<form class='inline' method='post' action='index.php'>
				<input type="hidden" name="action" value="add_spes_to_emp" />
				<td colspan='2'>
					<select name="spes_id">
						<?php foreach ($NotEmpSpecialties as $notInEmpSpes) : ?>
						<option value="<?php echo $notInEmpSpes->getSpecialty_id(); ?>"  >
							<?php echo $notInEmpSpes->getType(); ?>, 
							<?php echo $notInEmpSpes->getName(); ?>
						</option>
						<?php endforeach; ?>
					</select>			
				</td>
				<td><?php
                        $myCalendar = new tc_calendar("SpecStartDateForEmp", true, false);
                        $myCalendar->setIcon("../calendar/images/iconCalendar.gif");
                        $myCalendar->setDate(date('d'), date('m'), date('Y'));
                        $myCalendar->setPath("../calendar/");
                        $myCalendar->setYearInterval(2010, 2025);
                        $myCalendar->dateAllow('2008-05-13', '2040-03-01');
                        $myCalendar->setDateFormat('j F Y');
                        $myCalendar->setAlignment('left', 'bottom');
                        $myCalendar->writeScript();
                    ?>  
				</td>
				<td><?php
                        $myCalendar = new tc_calendar("SpecEndDateForEmp", true, false);
                        $myCalendar->setIcon("../calendar/images/iconCalendar.gif");
                        $myCalendar->setDate(date('d'), date('m'), date('Y'));
                        $myCalendar->setPath("../calendar/");
                        $myCalendar->setYearInterval(2010, 2025);
                        $myCalendar->dateAllow('2008-05-13', '2040-03-01');
                        $myCalendar->setDateFormat('j F Y');
                        $myCalendar->setAlignment('left', 'bottom');
                        $myCalendar->writeScript();
                     ?>  
				</td>
				<td>
					<input type="hidden" name="employee_id" value="<?php echo $employee->getEmployeeID(); ?>" />
					<input type="submit" value="Add to employee" />
				</td>	
			</form>
		</tr>
	</table>	
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>