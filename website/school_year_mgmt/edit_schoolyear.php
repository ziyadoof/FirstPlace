<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit School Year Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_schoolyear" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='4' class='tableTitle'>Speciality Infomation</th>
			</tr>
 			<tr>
				<th>* Start Year</th>
				<th>* End Year</th>
				<th>Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='SY_SD_new' value="<?php echo $SY_ToBeEdited->getStartDate(); ?>" required /></td>
				<td><input type='text' name='SY_ED_new' value="<?php echo $SY_ToBeEdited->getEndDate(); ?>" required /></td>
				<td><input type='date' name='SY_Name_new' value="<?php echo $SY_ToBeEdited->getName(); ?>" /></td>
  				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='SY_Edit_ID' value="<?php echo $SY_ToBeEdited->getSy_id(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='4' class='tableTitle'>Hloidays for School Years List</th>
		</tr>
		<tr>
			<th>Holiday Name</th>
 			<th>Start Date</th>
			<th>End Date</th>
			<th>Action</th>
		</tr>
		<?php foreach ($school_year as $sYear) : ?>
		<tr>
			<td><?php echo $sYear->getStartDate(); ?></td>
			<td><?php echo $sYear->getEndDate(); ?></td>
			<td><?php echo $sYear->getName(); ?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_schoolyear" />
					<input type="hidden" name="schoolyear_id" value="<?php echo $sYear->getSy_id(); ?>" />
                    <input type="submit" value="Delete Holiday" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
		<tr>
			<form class='inline' method='post' action='index.php'>
				<input type="hidden" name="action" value="add_holiday_to_year" />
				<td><input type='text' name='new_holiday_name'  /></td>
				<td><input type='text' name='new_holiday_sd' required /></td>
				<td><input type='text' name='new_holiday_ed' required /></td>
				<td>
					<input type="hidden" name="schoolyear_id" value="<?php echo $sYear->getSy_id(); ?>" />
                    <input type="submit" value="Add Holiday" />
				</td>
			</form>
		</tr>
	</table>	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>