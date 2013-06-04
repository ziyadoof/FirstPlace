<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit School Year Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_schoolyear" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='4' class='tableTitle'>Speciality Information</th>
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
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>