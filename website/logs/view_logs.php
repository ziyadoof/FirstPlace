<?php include '../view/header.php'; ?>

<div id="content"><h1>View Logs</h1>
  <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="view_logs" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='6' class='tableTitle'>View Logs</th>
			</tr>
 			<tr>
 				<th>Date</th>
				<th>Updater</th>
                                <th>Student</th>
                                <th>Old Attend</th>
                                <th>New Attend</th>
				<th>Type</th>
  			</tr>
 		<?php foreach ($logs as $log) : ?>
		<tr>
			<td><?php echo $log->getLog_Date(); ?></td>  
                        <td> <?php echo $log->getEmpFname(); ?>
				<?php echo ',' ?>
				<?php echo $log->getEmpLname(); ?>
			</td>
                        <td> <?php echo $log->getStFname(); ?>
				<?php echo ',' ?>
				<?php echo $log->getStLname(); ?>
			</td>
                         <td><?php foreach ($attenTys as $attendT )
					if ( $log->getOldAtt() == $attendT->getAttType_id() ) {
						echo $attendT->getAttType_Name();
					} ?></td>
			<td><?php foreach ($attenTys as $attendT )
					if ( $log->getNewAtt() == $attendT->getAttType_id() ) {
						echo $attendT->getAttType_Name();
					} ?></td> 
                        <td><?php echo $log->getLog_type_id(); ?></td>
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
	
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>