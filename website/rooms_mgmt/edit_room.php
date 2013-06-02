<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Edit Room Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_room" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Room Infomation</th>
			</tr>
 			<tr>
 				<th>* Room Name (ex. "BANN-305")</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='LocName_New' value="<?php echo $roomToBeEdited->getLocation(); ?>" required /></td>
  				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='r_id_cuurent' value="<?php echo $roomToBeEdited->getRoom_id(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>