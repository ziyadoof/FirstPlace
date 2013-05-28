<?php include '/view/header.php'; ?>

<div id="content"><h1>Person Table</h1>
	<form method='post' action='#displaytable'>
		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='8' class='tableTitle'>Create New Person Record</th>
			</tr>
 			<tr>
 				<th>*First Name</th>
				<th>*Last Name</th>
				<th>Email</th>
 				<th>Area Code</th>
 				<th>Phone Number</th>
 				<th>*Password</th>
 				<th>*Role ID</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='firstName_new' required /></td>
		 		<td><input type='text' name='lastName_new' required /></td>
		   		<td><input type='text' name='email_new' /></td>
	 			<td><input type='text' name='phoneAC_new' /></td>
		 		<td><input type='text' name='phone_new' /></td>
	 			<td><input type='password' name='password_new' required /></td>
		 		<td>
					<select name='roleID_new'>
	<option value="1">Admin</option><option value="2">Teacher</option><option value="3">Case Worker</option>
					</select>
				</td>
  				<td colspan='2' id='formButtons'>
 					<input type='hidden' name='form_action' value='create' />
			  		<input type='submit' value='Create' />
  					<a href='person.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
	</form>
	<div>Fields with * are required.</div>
	
		<table id='displaytable' class='imagetable'>
			<tr>
				<th colspan='8' class='tableTitle'>Person Records</th>
			</tr>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Area Code</th>
				<th>Phone Number</th>
				<th>Role ID</th>
				<th>Action</th>
			</tr>
		
				<tr>
					<td>1</td>
					<td>Albus</td>
					<td>Dumbledore</td>
					<td>adumbledore@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Admin
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='1' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='1' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>2</td>
					<td>Quirenus</td>
					<td>Quirrell</td>
					<td>qquirrell@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Admin
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='2' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='2' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>3</td>
					<td>Gilderoy</td>
					<td>Lockhart</td>
					<td>glockhart@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Teacher
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='3' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='3' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>4</td>
					<td>Remus</td>
					<td>Lupin</td>
					<td>rlupin@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Teacher
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='4' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='4' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>5</td>
					<td>Alastor</td>
					<td>Moody</td>
					<td>amoody@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Teacher
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='5' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='5' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>6</td>
					<td>Dolores</td>
					<td>Umbridge</td>
					<td>dumbridge@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Teacher
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='6' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='6' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>7</td>
					<td>Horace</td>
					<td>Slughorn</td>
					<td>hslughorn@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Teacher
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='7' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='7' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>8</td>
					<td>Minerva</td>
					<td>McGonagall</td>
					<td>mmcgonagall@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Case Worker
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='8' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='8' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>9</td>
					<td>Severus</td>
					<td>Snape</td>
					<td>ssnape@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Case Worker
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='9' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='9' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>10</td>
					<td>Filius</td>
					<td>Flitwick</td>
					<td>fflitwick@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Case Worker
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='10' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='10' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>20</td>
					<td>Pomona</td>
					<td>Sprout</td>
					<td>psprout@firstplace.com</td>
					<td>999</td>
					<td>999-9999</td>
					<td>
				Case Worker
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='20' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='20' />
							<input type='submit' value='Delete' />
						</form>
					</td>
				</tr>
				
				<tr>
					<td>21</td>
					<td>Jeff</td>
					<td>Gilles</td>
					<td>gillesj@seattleu.edu</td>
					<td>206</td>
					<td>123-1234</td>
					<td>
				Case Worker
					</td>
					<td>
						<form class='inline' method='post' action='#displaytable'>
							<input type='hidden' name='form_action' value='edit' />
							<input type='hidden' name='record_id' value='21' />
							<input type='submit' value='Edit' />
						</form>
						<form class='inline' method='post' action='#displaytable' onsubmit='return confirm_delete()'>
							<input type='hidden' name='form_action' value='delete' />
							<input type='hidden' name='record_id' value='21' />
							<input type='submit' value='Delete' />
						</form>
					</td>
		</tr>
				
	</table>
		
</div> <!-- #content -->

<?php include '/view/footer.php'; ?>