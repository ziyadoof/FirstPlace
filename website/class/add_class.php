<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Add Class</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_class" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='5' class='tableTitle'>Create New classes</th>
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
				    <select name="stdClass_new">
						<option value="NotSpecified">(Select)</option>
						<?php foreach ($stdClasses as $stdClass) : ?>
								<option value="<?php echo $stdClass->getStdClass_id(); ?>">
									<?php echo $stdClass->getClassName(); ?>
								</option>
						<?php endforeach; ?>
					</select>
				</td>
	 			<td>
				    <select name="classroom_new" required>
						<option value="NotSpecified">(Select)</option>
						<?php foreach ($rooms as $room) : ?>
								<option value="<?php echo $room->getRoom_id(); ?>">
									<?php echo $room->getLocation(); ?>
								</option>
						<?php endforeach; ?>
					</select>
				</td>
	 			<td>
				    <select name="term_new">
						<option value="NotSpecified">(Select)</option>
						<?php foreach ($terms as $term) : ?>
								<option value="<?php echo $term->getSy_id(); ?>">
									<?php echo $term->getStartDate(); ?>
									<?php echo '-' ?>
									<?php echo $term->getEndDate();?>
								</option>
						<?php endforeach; ?>
					</select>
				</td>
	 			<td>
				    <select name="teacher_new">
						<option value="NotSpecified">(Select)</option>
						<?php foreach ($teachers as $teacher) : ?>
								<option value="<?php echo $teacher->getEmployee_id(); ?>">
									<?php echo $teacher->getLastName() ?>
									<?php echo ',' ?>
									<?php echo $teacher->getFirstName() ?>
								</option>
						<?php endforeach; ?>
					</select>
				</td>
		   		<td><input type='submit' value='Add Class' name='action_new' required /></td>
			</tr>
		</table>
    </form>
	<br>
	<br>

	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='8' class='tableTitle'>Class List</th>
		</tr>
		<tr>
			<th>Standard Class</th>
			<th>Class Room</th>
			<th>School Year</th>
			<th>Teacher</th>
			<th>Action</th>				
		</tr>
		<?php foreach ($classes as $class) : ?>
		<tr>
			<td><?php $currGrade = $class->getStdC_id();
				foreach ($grades as $grade)
					if ( $currGrade == $grade->getStdClass_id() ) {
						echo $grade->getClassName();
						break;
					} ?>
			<td><?php $currRoom = $class->getRoom_id();
				foreach ($rooms as $room)
					if ( $currRoom == $room->getRoom_id() ) {
						echo $room->getLocation();
						break;
					} ?>
			<td><?php $currTerm = $class->getSchoolYear_id();
				foreach ($terms as $term)
					if ( $currTerm == $term->getSy_id() ) {
						echo $term->getName();
						break;
					} ?>
		</tr>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>