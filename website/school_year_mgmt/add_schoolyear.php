<?php include '../view/header.php'; 
      require ('schoolCalendar.php');
     // require('../calendar/classes/tc_calendar.php')
?>

<div id="content">
	<h1>School Year Management</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_schoolyear" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='4' class='tableTitle'>Create new School Year</th>
			</tr>
 			<tr>
				<th>* Start Year</th>
 				<th>* End Year</th>
				<th>Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
                                <td><?php                                 
                                        $myCalendar = new schoolCalendar("startY_new", true, false);
                                        $myCalendar->writeScript();
                                        ?>  </td>
                                <td><?php                                 
                                        $myCalendar = new schoolCalendar("endY_new", true, false);
                                        $myCalendar->writeScript();
                                        ?>  </td>				
				<td><input type='text' name='yearName_new' /></td>
  				<td colspan='2' id='formButtons'>
			  		<input type='submit' value="Add Year" />
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='4' class='tableTitle'>School Years List</th>
		</tr>
		<tr>
			<th>Start Year</th>
 			<th>End Year</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
		<?php foreach ($school_year as $sYear) : ?>
		<tr>
			<td><?php echo $sYear->getStartDate(); ?></td>
			<td><?php echo $sYear->getEndDate(); ?></td>
			<td><?php echo $sYear->getName(); ?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_schoolyear" />
					<input type="hidden" name="schoolyear_id" value="<?php echo $sYear->getSy_id(); ?>" />
                    <input type="submit" value="Edit / Add   Holidays" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>