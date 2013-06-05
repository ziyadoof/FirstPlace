<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Attendance Type Management</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_attType" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Create new attendance type</th>
			</tr>
 			<tr>
 				<th>* Attendance Type Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='attTypeName_new' required /></td>
  				<td colspan='2' id='formButtons'>
			  		<input type='submit' value="Add Attendance Type" />
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='2' class='tableTitle'>Attendance Types List</th>
		</tr>
		<tr>
			<th>Attendance Type Name</th>
			<th>Action</th>
		</tr>
		<?php foreach ($AttTypes as $attType) : ?>
		<tr>
			<td><?php echo $attType->getAttType_Name(); ?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_attType" />
					<input type="hidden" name="attType_id" value="<?php echo $attType->getAttType_id(); ?>" />
                    <input type="submit" value="Edit" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>