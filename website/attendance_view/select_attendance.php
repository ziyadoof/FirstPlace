<?php include '../view/header.php'; 
require ('../school_year_mgmt/schoolCalendar.php');?>

<div id="content">
	<h1>Select a class for the current year</h1>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='4' class='tableTitle'>Classes List</th>
		</tr>
		<tr>
			<th>Class Name</th>
			<th>Class Year</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
		<?php foreach ($AvailableClasses as $classes) : ?>
		<form action="index.php" method="post" class="imagetable" id="formtable">
		<tr>
			<td><?php echo $classes->getStdClassName(); ?></td>
			<td><?php echo $classes->getClassYearName(); ?></td>
			 <td><?php                                 
                                        $myCalendar = new schoolCalendar("selected_date", true, false);
                                        $myCalendar->disableAllHolidays();
                                        $myCalendar->writeScript();
                                        ?>  </td>
                	<td>
				<input type="hidden" name="action" value="view_attendance" />
				<input type="hidden" name="ClassID" value="<?php echo $classes->getC_id(); ?>" />
				<input type="submit" value="Select" />
			</td>			
		</tr>
		</form>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>