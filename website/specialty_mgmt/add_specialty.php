<?php include '../view/header.php'; ?>

<div id="content">
	<h1>Specialties Management</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_specialty" />
      
        
		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='3' class='tableTitle'>Create new Specialty</th>
			</tr>
 			<tr>
				<th>* Specialty Type</th>
 				<th>* Specialty Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='spesType_new' required /></td>
				<td><input type='text' name='spesName_new' required /></td>
  				<td colspan='2' id='formButtons'>
			  		<input type='submit' value="Add Specialty" />
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='3' class='tableTitle'>Specialty List</th>
		</tr>
		<tr>
			<th>Specialty Type</th>
			<th>Specialty Name</th>
			<th>Action</th>
		</tr>
		<?php foreach ($specialty as $spes) : ?>
		<tr>
			<td><?php echo $spes->getType(); ?></td>
			<td><?php echo $spes->getName(); ?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_specialty" />
					<input type="hidden" name="spes_id" value="<?php echo $spes->getSpecialty_id(); ?>" />
                    <input type="submit" value="Edit" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>