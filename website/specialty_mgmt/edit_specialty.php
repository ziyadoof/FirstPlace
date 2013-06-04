<?php include '../view/header.php'; 
require('../calendar/classes/tc_calendar.php');
?>

<div id="content">

	<h1>Edit Specialty Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_specialty" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='5' class='tableTitle'>Speciality Infomation</th>
			</tr>
 			<tr>
				<th>* Specialty Type</th>
 				<th>* Specialty Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='sType_new' value="<?php echo $spesToBeEdited->getType(); ?>" required /></td>
				<td><input type='text' name='sName_new' value="<?php echo $spesToBeEdited->getName(); ?>" required /></td>                   
				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='s_id_to_edit' value="<?php echo $spesToBeEdited->getSpecialty_id(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>