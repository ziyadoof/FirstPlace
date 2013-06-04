<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Roles Management</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_role" />
		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Create new role</th>
			</tr>
 			<tr>
 				<th>* Role Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='roleName_new' required /></td>
  				<td colspan='2' id='formButtons'>
			  		<input type='submit' value="Add Role" />
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='2' class='tableTitle'>Roles List</th>
		</tr>
		<tr>
			<th>Role Name</th>
			<th>Action</th>
		</tr>
		<?php foreach ($roles as $role) : ?>
		<tr>
			<td><?php echo $role->getRoleName(); ?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_room" />
					<input type="hidden" name="role_id" value="<?php echo $role->getRole_id(); ?>" />
                    <input type="submit" value="Edit" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>