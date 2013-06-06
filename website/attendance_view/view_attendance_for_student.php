<?php include '../view/header.php'; ?>

<div id="content">
	<h1>Attendance Information</h1>

	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='3' class='tableTitle'>Students Information</th>
		</tr>
		<tr>
			<th>Date</th>
			<th>Attendance Status</th>
			<th>Comment</th>
		</tr>
		<!-- #Students that are currently in this class -->
		<?php foreach ($attendacneRecords as $attInfoRow) : ?>
			<tr>
				<td><?php echo $attInfoRow->getAtt_date(); ?></td>
				<td><?php echo $attInfoRow->getAttTypeName(); ?></td>
				<td><?php echo $attInfoRow->getAttComment(); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content -->

<?php include '../view/footer.php'; ?>