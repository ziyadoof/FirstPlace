<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit Standard Class</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_standardClass" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Standard Class Infomation</th>
			</tr>
 			<tr>
 				<th>*Standard Class Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='stdClass_Name' value="<?php echo $stdClassToBeEdited->getClassName(); ?>" required /></td>
  				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='stdClass_id' value="<?php echo $stdClassToBeEdited->getStdClass_id(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>