<?php include '../view/header.php'; ?>

<div id="content">
	<h1>Attendance Information</h1>
	<table id='formtable' class='imagetable'>
		<tr>
			<th colspan='5' class='tableTitle'>Class Information</th>
		</tr>
 		<tr>
 			<th>Class Name</th>
			<th>Year</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Action</th>			
  		</tr>
 		<tr>				
			<td><?php echo $ClassRow->getStdClassName(); ?></td>
			<td><?php echo $ClassRow->getClassYearName(); ?></td>
			<td><?php echo $ClassRow->getClassStartTime(); ?></td>
			<td><?php echo $ClassRow->getClassEndTime(); ?></td>
	   		<td>
				<a href='index.php'><button type='button'>Go Back</button></a>
			</td>
		</tr>
	</table>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='5' class='tableTitle'>Students Information</th>
		</tr>
		<tr>
			<th>Date</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Attendance Status</th>
			<th>Comment</th>
		</tr>
		<!-- #Students that are currently in this class -->
		<?php foreach ($attendacneRecords as $attInfoRow) : ?>
			<tr>
				<td><?php echo $attInfoRow->getAtt_date(); ?></td>
				<td><?php echo $attInfoRow->getAtt_s_FName(); ?></td>
				<td><?php echo $attInfoRow->getAtt_s_LName(); ?></td>
				<td><?php echo $attInfoRow->getAttTypeName(); ?></td>
				<td><?php echo $attInfoRow->getAttComment(); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>