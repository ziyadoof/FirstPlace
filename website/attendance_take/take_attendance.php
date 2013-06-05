<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Take Attendance</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_class" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='5' class='tableTitle'>Update classes</th>
			</tr>
 			<tr>
 				<th>Class Name</th>
				<th>Year</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Action</th>				
  			</tr>
 			<tr>				
	 			<td><?php echo $ClassInfo->getStdClassName(); ?></td>
				<td><?php echo $ClassInfo->getClassYearName(); ?></td>
				<td><?php echo $ClassInfo->getClassStartTime(); ?></td>
				<td><?php echo $ClassInfo->getClassEndTime(); ?></td>
		   		<td>
					<a href='index.php'><button type='button'>Cancel</button></a>
				</td>
			</tr>
		</table>
    </form>
	<br>
	<form class='inline' method='post' action='index.php'>	
		<table id='displaytable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Students in class</th>
			</tr>
			<tr>
				<th>Student Name</th>
				<th>Attendance Statues</th>
			</tr>
			<!-- #Students that are currently in this class -->
			<?php foreach ($studentsInClass as $currStudent) : ?>
				<tr>
					<input type="hidden" name="classId_edit" value="<?php echo $class_selected->getC_id(); ?>" />
					<input type="hidden" name="studentId_remove" value="<?php echo $currStudent->getStudentID(); ?>" />
					<td><?php echo $currStudent->getLastName(); echo ", "; echo $currStudent->getFirstName(); ?></td>
					<td>
						<select name="attendanceType_id" required>
							<?php foreach ($AttTypes as $attType) : ?>
								<option value="<?php echo $attType->getAttType_id(); ?>" <?php if ($attType->getAttType_Name() == 'Present') { echo "selected";}?> >
									<?php echo $attType->getAttType_Name(); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		<input type="hidden" name="action" value="remove_student_from_class" />
		<input type="submit" value="Submit" />
	</form>
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>