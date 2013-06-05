<?php include '../view/header.php'; ?>

<div id="content"><h1>View Logs</h1>
  <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="view_logs" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='3' class='tableTitle'>View Logs</th>
			</tr>
 			<tr>
 				<th>Date</th>
				<th>Employee</th>
				<th>Modified</th>
  			</tr>
 		<?php foreach ($logs as $log) : ?>
		<tr>
			<td><?php echo $log->getLog_Date(); ?></td>
                        <td><?php echo $log->getEmp_id(); ?></td>
                        <td><?php echo $log->getLog_type_id(); ?></td>
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
	
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>