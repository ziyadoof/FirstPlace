<?php include '../view/header.php'; ?>

<div id="content">
	<h1>Select a student</h1>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='9' class='tableTitle'>Student List</th>
		</tr>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Grade</th>
			<th>Action</th>
		</tr>
		<?php foreach ($students as $student) : ?>
		<tr>
			<td><?php echo $student->getFirstName(); ?></td>
			<td><?php echo $student->getLastName(); ?></td>
            <td><?php echo $student->getGrade(); ?></td>
            <td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_student" />
					<input type="hidden" name="student_id" value="<?php echo $student->getStudentID(); ?>" />
                    <input type="submit" value="Select" />
                </form>
            </td>			
		</tr>
		<?php endforeach; ?>
	</table>
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>