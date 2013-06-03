<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit Class Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_class" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='8' class='tableTitle'>Class Infomation</th>
			</tr>
 			<tr>
 				<th>Grade</th>
				<th>Class Room</th>
				<th>School Year</th>
				<th>Teacher</th>
				<th>Action</th>
  			</tr>
 			<tr>
				
 				<td>
				    <select name="classRoom_cuurent">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($class->getRoom() == $room->getLocation()) { echo "selected";}?>>
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				
				<td>
				    <select name="stdClass_current">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($grades as $grade) : ?>
						<option value="<?php echo $grade->getStdC_id(); ?>" <?php if ($class->getStdC_id() == $grade->getLocation()) { echo "selected";}?>>
							<?php echo $grade->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				
				<td>
				    <select name="classRoom_cuurent">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($class->getRoom() == $room->getLocation()) { echo "selected";}?>>
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				
				<td>
				    <select name="classRoom_cuurent">
						<option value="NotSpecified">No Room</option>
						<?php foreach ($rooms as $room) : ?>
						<option value="<?php echo $room->getRoom_id(); ?>" <?php if ($class->getRoom() == $room->getLocation()) { echo "selected";}?>>
							<?php echo $room->getLocation(); ?>
						</option>
						<?php endforeach; ?>
					</select>
				</td>
				
  				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='cID_cuurent' value="<?php echo $class->getC_id(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>