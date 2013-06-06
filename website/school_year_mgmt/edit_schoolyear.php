<?php include '../view/header.php'; 
require ('schoolCalendar.php');
?>

<div id="content">

	<h1>Edit School Year Record</h1>
	
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="update_schoolyear" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='4' class='tableTitle'>School Year Information</th>
			</tr>
 			<tr>
				<th>* Start Year</th>
				<th>* End Year</th>
				<th>Name</th>
				<th>Action</th>
  			</tr>
 			<tr>
                                <td><?php    
                                        $default_date = $SY_ToBeEdited->getStartDate();
                                
                                        $myCalendar = new schoolCalendar("SY_SD_new", true, false);
                                        $myCalendar->disableAllHolidays();
                                        $myCalendar->setDate(date('d', strtotime($default_date))
                                            , date('m', strtotime($default_date))
                                            , date('Y', strtotime($default_date)));
                                        $myCalendar->writeScript();
                                        ?>  </td>
                                <td><?php    
                                        $default_date = $SY_ToBeEdited->getEndDate();
                                
                                        $myCalendar = new schoolCalendar("SY_ED_new", true, false);
                                        $myCalendar->disableAllHolidays();
                                        $myCalendar->setDate(date('d', strtotime($default_date))
                                            , date('m', strtotime($default_date))
                                            , date('Y', strtotime($default_date)));
                                        $myCalendar->writeScript();
                                        ?>  </td>
                                <td><input type='text' name='SY_Name_new' value="<?php echo $SY_ToBeEdited->getName(); ?>" /></td>
  				<td colspan='2' id='formButtons'>
					<input type='hidden'  name='SY_Edit_ID' value="<?php echo $SY_ToBeEdited->getSy_id(); ?>" />
			  		<input type='submit' value="Update" />
					<a href='index.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
	
	<br>
	
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='4' class='tableTitle'>Holidays List for School Year</th>
		</tr>
		<tr>
			<th>Holiday Name</th>
 			<th>Start Date</th>
			<th>End Date</th>
			<th>Action</th>
		</tr>
                <tr>
			<form class='inline' method='post' action='index.php'>
				<input type="hidden" name="action" value="add_holiday_to_year" />
				<td><input type='text' name='new_holiday_name'  /></td>
				<td><?php                                 
                                        $myCalendar = new schoolCalendar("new_holiday_sd", true, false);
                                        $myCalendar->disableHolidays($SY_ToBeEdited->getSy_id());
                                        $myCalendar->writeScript();
                                        ?>  </td>
				<td><?php                                 
                                        $myCalendar = new schoolCalendar("new_holiday_ed", true, false);
                                        $myCalendar->disableHolidays($SY_ToBeEdited->getSy_id());
                                        $myCalendar->writeScript();
                                        ?>  </td>
				<td>
					<input type="hidden" name="AddTo_schoolyear_id" value="<?php echo $SY_ToBeEdited->getSy_id(); ?>" />
                    <input type="submit" value="Add Holiday" />
				</td>
			</form>
		</tr>
		<?php foreach ($YearHolidays as $YHoliday) : ?>
		<tr>
			<td><?php echo $YHoliday->getName(); ?></td>
			<td><?php echo $YHoliday->getStartDate(); ?></td>
			<td><?php echo $YHoliday->getEndDate(); ?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="delete_holiday_from_year" />
					<input type="hidden" name="edited_SY_id" value="<?php echo $SY_ToBeEdited->getSy_id(); ?>" />
					<input type="hidden" name="hli_id_to_delete" value="<?php echo $YHoliday->getHoli_id(); ?>" />
                    <input type="submit" value="Delete Holiday" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	
	</table>	

</div> <!-- #content -->

<?php include '../view/footer.php'; ?>