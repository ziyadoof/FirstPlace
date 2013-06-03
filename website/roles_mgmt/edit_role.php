<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit Role Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_role" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Role Infomation</th>
			</tr>
 			<tr>
 				<th>* Role Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='roleName_New' value="<?php echo $roleToBeEdited->getRoleName(); ?>" required /></td>
  				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='r_id_cuurent' value="<?php echo $roleToBeEdited->getRole_id(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>