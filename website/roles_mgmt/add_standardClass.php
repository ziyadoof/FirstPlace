<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Standard Classes Management</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_standardClass" />
		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Create new standard class</th>
			</tr>
 			<tr>
 				<th>*Standard Class Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='stdClassName_new' required /></td>
  				<td colspan='2' id='formButtons'>
			  		<input type='submit' value="Add Standard Class" />
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='2' class='tableTitle'>Standard Class List</th>
		</tr>
		<tr>
			<th>*Standard Class Name</th>
				<th>Action</th>
		</tr>
		<?php foreach ($stdClasses as $stdClass) : ?>
		<tr>
			<td><?php echo $stdClass->getClassName(); ?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_stdClass" />
					<input type="hidden" name="role_id" value="<?php echo $stdClass->getStdClass_id(); ?>" />
                    <input type="submit" value="Edit" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>