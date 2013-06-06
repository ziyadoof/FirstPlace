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
	<form class='inline' method='post' action='index.php' name='attendencePosts'>	
		<table id='displaytable' class='imagetable'>
			<tr>
				<th colspan='3' class='tableTitle'>Students in class</th>
			</tr>
			<tr>
				<th>Student Name</th>
				<th>Attendance Statues</th>
				<th>Comment</th>
			</tr>
			<!-- #Students that are currently in this class -->
			<?php $number_of_rows = 0; ?>
			<?php foreach ($studentsInClass as $currStudent) : ?>
				<tr>
					<input type="hidden" name="classId_add_<?php echo $number_of_rows; ?>" value="<?php echo $class_selected->getC_id(); ?>" />
					<input type="hidden" name="studentId_add_<?php echo $number_of_rows; ?>" value="<?php echo $currStudent->getStudentID(); ?>" />
					<td><?php echo $currStudent->getLastName(); echo ", "; echo $currStudent->getFirstName(); ?></td>
					<td>
						<select name="attendanceType_id_<?php echo $number_of_rows; ?>" required>
							<?php foreach ($AttTypes as $attType) : ?>
								<option value="<?php echo $attType->getAttType_id(); ?>" <?php if ($attType->getAttType_Name() == 'Present') { echo "selected";}?> >
									<?php echo $attType->getAttType_Name(); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</td>
					<td><textarea name="attendance_comment_<?php echo $number_of_rows; ?>" rows='1' cols='20' value=""></textarea></td>
				</tr>
			<?php $number_of_rows++; ?>
			<?php endforeach; ?>
		</table>
		<input type="hidden" name="rows_count" value="<?php echo $number_of_rows; ?>" />
		<input type="hidden" name="action" value="apply_attendace" />
		<input type="submit" value="Submit" />
	</form>
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>