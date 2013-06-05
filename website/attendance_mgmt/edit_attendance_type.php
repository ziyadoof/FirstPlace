<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit Attendance Type Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_attType" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Attendance Type Infomation</th>
			</tr>
 			<tr>
 				<th>* Attendance Type Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='AttType_New_Name' value="<?php echo $attTypeToBeEdited->getAttType_Name(); ?>" required /></td>
  				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='attType_id_cuurent' value="<?php echo $attTypeToBeEdited->getAttType_id(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>