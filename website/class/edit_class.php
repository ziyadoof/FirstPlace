<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit Class Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_class" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='5' class='tableTitle'>Update classes</th>
			</tr>
 			<tr>
 				<th>Standard Class</th>
				<th>Class Room</th>
				<th>School Year</th>
				<th>Teacher</th>
				<th>Action</th>				
  			</tr>
 			<tr>				
	 			<td>
				    <select name="stdClass_update" selectedindex="2" required>
						<option value="NotSelected">(Select)</option>
						<?php foreach ($stdClasses as $stdClass) : ?>
								<option value="<?php echo $stdClass->getStdClass_id(); ?>" <?php if ($classToEdit->getStdC_id() == $stdClass->getStdClass_id()) { echo "selected";}?> >
									<?php echo $stdClass->getClassName(); ?>
								</option>
						<?php endforeach; ?>
					</select>
				</td>
	 			<td>
				    <select name="classroom_update" required>
						<option value="NotSpecified">(Select)</option>
						<?php foreach ($rooms as $room) : ?>
								<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($classToEdit->getRoom_id() == $room->getRoom_id()) { echo "selected";}?> >
									<?php echo $room->getLocation(); ?>
								</option>
						<?php endforeach; ?>
					</select>
				</td>
	 			<td>
				    <select name="term_update" required>
						<option value="NotSpecified">(Select)</option>
						<?php foreach ($terms as $term) : ?>
								<option value="<?php echo $term->getSy_id(); ?>" <?php if ($classToEdit->getSchoolYear_id() == $term->getSy_id()) { echo "selected";}?> >
									<?php echo $term->getStartDate(); ?>
									<?php echo '-' ?>
									<?php echo $term->getEndDate();?>
								</option>
						<?php endforeach; ?>
					</select>
				</td>
	 			<td>
				    <select name="teacher_update" required>
						<option value="NotSpecified">(Select)</option>
						<?php foreach ($employees as $teacher) : ?>
								<option value="<?php echo $teacher->getEmployeeID(); ?>" <?php if ($classToEdit->getEmp_id() == $teacher->getEmployeeID()) { echo "selected";}?> >
									<?php echo $teacher->getLastName() ?>
									<?php echo ',' ?>
									<?php echo $teacher->getFirstName() ?>
								</option>
						<?php endforeach; ?>
					</select>
				</td>
		   		<td>
					<input type="hidden" name="action" value="update_class" />
					<input type="hidden" name="classId" value="<?php echo $classToEdit->getC_id(); ?>" />
					<input type='submit' value='Update Class'/>
				</td>
			</tr>
		</table>
    </form>
	<br>
	<br>
			
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>