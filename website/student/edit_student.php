<?php include '../view/header.php'; 
require('../calendar/classes/tc_calendar.php');
?>

<div id="content">

	<h1>Edit Student Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_student" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='10' class='tableTitle'>Student Information</th>
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
 			<tr>
				
 				<td><input type='text' name='firstName_cuurent' value="<?php echo $student->getFirstName(); ?>" required /></td>
		 		<td><input type='text' name='lastName_cuurent' value="<?php echo $student->getLastName(); ?>" required /></td>
				<td><input type='text' name='phoneNumber_cuurent' value="<?php echo $student->getPhoneNum(); ?>"  required/></td>
				<td><input type='text' name='address_cuurent' value="<?php echo $student->getAddress(); ?>" required/></td>
		   		<td><input type='email' name='email_cuurent' value="<?php echo $student->getEmail(); ?>"  /></td>
                                <td><input type='text' name='grade_cuurent' value="<?php echo $student->getGrade(); ?>" /></td>
	 			<td>
				    <select name="casework_cuurent">
						<option value="NotSpecified">No Employee</option>
						<?php foreach ($caseworks as $employee) : ?>
						<option value="<?php echo $employee->getEmployeeID() ; ?>" <?php if ($student->getCaseWorker() == $employee->getUserName()) { echo "selected";}?>>
							<?php echo $employee->getUserName(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>                                
                		<td>
				    <select name="class_cuurent">
						<option value="NotSpecified">ToDO</option>
					</select>
				</td>
                                		<td><?php
                                        $default_date = $student->getStartDate();
                                
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
                                        ?></td>  
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