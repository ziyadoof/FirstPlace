<?php include '../view/header.php'; 
require('../calendar/classes/tc_calendar.php');
?>

<div id="content">

	<h1>Edit Student Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_student" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='9' class='tableTitle'>Student Information</th>
			</tr>
 			<tr>
 				<th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Email</th>
                <th>Grade</th>
                <th>Case Worker</th>
                <th>Start Date</th>
                <th>Action</th>
			</tr>
 			<tr>
 				<td><input type='text' name='firstName_cuurent' value="<?php echo $studentEdit->getFirstName(); ?>" required /></td>
		 		<td><input type='text' name='lastName_cuurent' value="<?php echo $studentEdit->getLastName(); ?>" required /></td>
				<td><input type='text' name='phoneNumber_cuurent' value="<?php echo $studentEdit->getPhoneNum(); ?>"  required/></td>
				<td><input type='text' name='address_cuurent' value="<?php echo $studentEdit->getAddress(); ?>" required/></td>
		   		<td><input type='email' name='email_cuurent' value="<?php echo $studentEdit->getEmail(); ?>"  /></td>
                		<td>
				    <select name="grade_cuurent"> 
                                                <option value="NotSpecified"  <?php if($studentEdit->getGrade() == NULL){ echo "selected";}?>>No Grade</option>
                                                <option value="1st"<?php if($studentEdit->getGrade() == '1st'){ echo "selected";}?> >1st </option>
                                                <option value="2nd" <?php if($studentEdit->getGrade() == '2nd'){ echo "selected";}?>>2nd</option>
                                                <option value="3th" <?php if($studentEdit->getGrade() == '3rd'){ echo "selected";}?>>3th</option>
                                                <option value="4th" <?php if($studentEdit->getGrade() == '4th'){ echo "selected";}?>>4th</option>
                                                <option value="5th" <?php if($studentEdit->getGrade() == '5th'){ echo "selected";}?>>5th</option>
                                                <option value="6th" <?php if($studentEdit->getGrade() == '6th'){ echo "selected";}?>>6th</option>
					</select>
				</td>
				</td>
                                <td>
				    <select name="casework_cuurent">
						<option value="NotSpecified">No Employee</option>
						<?php foreach ($caseworks as $employee) : ?>
						<option value="<?php echo $employee->getEmployeeID() ; ?>" <?php if ($studentEdit->getCaseWorker() == $employee->getUserName()) { echo "selected";}?>>
							<?php echo $employee->getLastName() ?>
							<?php echo ',' ?>
							<?php echo $employee->getFirstName() ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>                                
                              <td><?php
                                        $default_date = $studentEdit->getStartDate();
                                        $myCalendar = new tc_calendar("year_cuurent", true, false);
                                        $myCalendar->setIcon("../calendar/images/iconCalendar.gif");
                                        $myCalendar->setDate(date('d', strtotime($default_date))
                                            , date('m', strtotime($default_date))
                                            , date('Y', strtotime($default_date)));
                                        $myCalendar->setPath("../calendar/");
                                        $myCalendar->setYearInterval(2010, 2025);
                                        $myCalendar->dateAllow('2008-05-13', '2040-03-01');
                                        $myCalendar->setDateFormat('j F Y');
                                        $myCalendar->setAlignment('left', 'bottom');
                                        $myCalendar->writeScript();
                                        ?>
				</td>  
                <td colspan='2' id='formButtons'>
                     			<input type='hidden'  name='stID_cuurent' value="<?php echo $studentEdit->getStudentID(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>