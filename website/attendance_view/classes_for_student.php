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
		<?php foreach ($StudentClasses as $class) : ?>
		<tr>
			<td><?php echo $class->getClass_Name(); ?></td>
			<td><input type="date" name="req_start_date" required /></td>
			<td><input type="date" name="req_end_date" required /></td>
            <td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="view_attendenc_for_std_in_class" />
					<input type="hidden" name="student_id" value="<?php echo $class->getStudent_id(); ?>" />
					<input type="hidden" name="class_id" value="<?php echo $class->getClass_id(); ?>" />
                    <input type="submit" value="Select" />
                </form>
            </td>			
		</tr>
		<?php endforeach; ?>
	</table>
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>