<?php include '../view/header.php'; ?>

<div id="content"><h1>Notifications</h1>

  <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="view_logs" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='6' class='tableTitle'>View Notifications</th>
			</tr>
 			<tr>
 				<th>Date</th>
				<th>Case Worker</th>
                                <th>Student</th>
                                <th>Attend</th>
  			</tr>
 		<?php foreach ($notifs as $notif) : ?>
		<tr>
			<td><?php echo $notif->getNotf_date(); ?></td>  
                        <td> <?php echo $notif->getCW_Fname(); ?>
				<?php echo ',' ?>
				<?php echo $notif->getCW_Lname(); ?>
			</td>
                        <td> <?php echo $notif->getStFname(); ?>
				<?php echo ',' ?>
				<?php echo $notif->getStLname(); ?>
			</td>
                         <td><?php foreach ($attenTys as $attendT )
				if ( $notif->getAtt() == $attendT->getAttType_id() ) {
					echo $attendT->getAttType_Name();
				} ?></td>
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
	
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>