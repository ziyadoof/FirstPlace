<?php include '../view/header.php'; ?>

<div id="content">
	<h1>Attendance Information</h1>
	<table id='formtable' class='imagetable'>
		<tr>
			<th colspan='5' class='tableTitle'>Class Information</th>
		</tr>
 		<tr>
 			<th>Class Name</th>
			<th>Year</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Action</th>			
  		</tr>
 		<tr>				
			<td><?php echo $ClassRow->getStdClassName(); ?></td>
			<td><?php echo $ClassRow->getClassYearName(); ?></td>
			<td><?php echo $ClassRow->getClassStartTime(); ?></td>
			<td><?php echo $ClassRow->getClassEndTime(); ?></td>
	   		<td>
				<a href='index.php'><button type='button'>Go Back</button></a>
			</td>
		</tr>
	</table>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='6' class='tableTitle'>Students Information</th>
		</tr>
		<tr>
			<th>Date</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Attendance Status</th>
			<th>Comment</th>
			<th>Action</th>
		</tr>
		<!-- s -->
		<form class='inline' method='post' action='index.php' name='attendencePosts'>
			<?php foreach ($attendacneRecords as $attInfoRow) : ?>
				<tr>
					<td><?php echo $attInfoRow->getAtt_date(); ?></td>
					<td><?php echo $attInfoRow->getAtt_s_FName(); ?></td>
					<td><?php echo $attInfoRow->getAtt_s_LName(); ?></td>
					<td>
						<select name="attendace_id">
							<?php foreach ($AttTypes as $attType) : ?>
							<option value="<?php echo $attType->getAttType_id(); ?>" <?php if ($attInfoRow->getAttTypeName() == $attType->getAttType_Name()) { echo "selected";}?>>
								<?php echo $attType->getAttType_Name(); ?>
							</option>
							<?php endforeach; ?>
						</select>
					</td>
					<td><input type='text' name='att_comment' value="<?php echo $attInfoRow->getAttComment(); ?>" required /></td>
					<td>
						<input type="hidden" name="action" value="update_attendance" />
						<input type="hidden" name="class_id" value="<?php echo $attInfoRow->getAtt_class_id(); ?>" />
						<input type="hidden" name="student_id" value="<?php echo $attInfoRow->getAtt_student_id(); ?>" />
						<input type="hidden" name="attDate" value="<?php echo $attInfoRow->getAtt_date(); ?>" />
						<input type="submit" value="Update" />
					</td>
				</tr>
			<?php endforeach; ?>
		</form>
	</table>
	
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>