<?php include '../view/header.php'; ?>

<div id="content">
	<h1>Select a class</h1>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='2' class='tableTitle'>Classes List</th>
		</tr>
		<tr>
			<th>First Name</th>
			<th>From Date</th>
			<th>To Date</th>
			<th>Action</th>
		</tr>
		<?php foreach ($StudentClasses as $classRow) : ?>
		<form class='inline' method='post' action='index.php'>
		<tr>
			<td><?php echo $classRow->getClass_Name(); ?></td>
			<td><input type="date" name="req_start_date" required /></td>
			<td><input type="date" name="req_end_date" required /></td>
            <td>

					<input type="hidden" name="action" value="view_attendenc_for_std_in_class" />
					<input type="hidden" name="student_id" value="<?php echo $classRow->getStudent_id(); ?>" />
					<input type="hidden" name="class_id" value="<?php echo $classRow->getClass_id(); ?>" />
                    <input type="submit" value="Select" />
            </td>			
		</tr>
		</form>
		<?php endforeach; ?>
	</table>
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>