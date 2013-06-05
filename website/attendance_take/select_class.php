<?php include '../view/header.php'; ?>

<div id="content">
	<h1>Select on of this year classes</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="take_attendance_for_class" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Available classes</th>
			</tr>
 			<tr>
 				<th>Class Information</th>
				<th>Action</th>
  			</tr>
 			<tr>
	 			<td>
				    <select name="ClassID">
						<?php foreach ($AvailableClasses as $classes) : ?>
						<option value="<?php echo $classes->getC_id(); ?>">
							<?php echo $classes->getStdClassName(); ?>, 
							<?php echo $classes->getClassYearName(); ?>, 
						</option>
						<?php endforeach; ?>
					</select>
				</td>
  				<td colspan='2' id='formButtons'>
			  		<input type='submit' value="Select" />
 				</td>
			</tr>
		</table>
    </form>
	
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>