<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit Class Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_class" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='5' class='tableTitle'>Class Infomation</th>
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
				    <select name="stdClass_current">
						
						<?php foreach ($stdClasses as $stdClass) : ?>
						<option value="<?php echo $stdClass->getStdC_id(); ?>" <?php if ($class->getStdC_id() == $stdClass->getStdC_id()) { echo "selected";}?>>
							<?php echo $stdClass->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				
				<td>
				    <select name="classRoom_current">
						
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($class->getRoom_id() == $room->getRoom_id()) { echo "selected";}?>>
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				
				<td>
				    <select name="schoolyear_current">
						
						<?php foreach ($terms as $term) : ?>
						<option value="<?php echo $term->getSchoolYear_id(); ?>" <?php if ($class->getSchoolYear_id() == $term->getSchoolYear_id()) { echo "selected";}?>>
							<?php echo $term->getStartDate(); ?>
							<?php echo '-' ?>
							<?php echo $term->getEndDate();?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				
				<td>
				    <select name="teacher_current">
						
						<?php foreach ($employees as $teacher) : ?>
						<option value="<?php echo $teacher->getEmployeeID(); ?>" <?php if ($class->getEmployeeID() == $teacher->getEmployeeID()) { echo "selected";}?>>
							<?php echo $teacher->getLastName() ?>
							<?php echo ',' ?>
							<?php echo $teacher->getFirstName() ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				
  				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='cid_current' value="<?php echo $class->getC_id(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>