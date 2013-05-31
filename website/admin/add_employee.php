<?php include '../view/header.php'; ?>

<div id="content">

	<h1>User Management</h1>
    <h2>Add Employee</h2>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_product" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='10' class='tableTitle'>Create new user</th>
			</tr>
 			<tr>
 				<th>*First Name</th>
				<th>*Last Name</th>
				<th>Phone Numebr</th>
				<th>Address</th>
				<th>*Email</th>
				<th>Class Room</th>
 				<th>*Username</th>
 				<th>*Password</th>
				<th>*Role ID</th>
				<th>Action</th>
  			</tr>
 			<tr>
				
 				<td><input type='text' name='firstName_new' required /></td>
		 		<td><input type='text' name='lastName_new' required /></td>
				<td><input type='tel' name='phoneNumber_new'  /></td>
				<td><input type='text' name='address_new' /></td>
		   		<td><input type='email' name='email_new' required /></td>
	 			<td><input type='text' name='classRoom_new' /></td>
				<td><input type='text' name='username_new' required /></td>
	 			<td><input type='password' name='password_new' required /></td>
		 		<td>
					<select name='roleID_new'>
						<option value="1">Admin</option><option value="2">Teacher</option><option value="3">Case Worker</option>
					</select>
				</td>
  				<td colspan='2' id='formButtons'>
 					<input type='hidden' name='form_action' value='create' />
			  		<input type='submit' value="Add User" />
  					<a href='person.php'><button type='button'>Cancel</button></a>
 				</td>
			</tr>
		</table>
    </form>
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>