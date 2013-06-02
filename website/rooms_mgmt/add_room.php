<?php include '../view/header.php'; ?>

<div id="content">

	<h1>Rooms Management</h1>
    <form action="index.php" method="post" class="imagetable" id="formtable">
        <input type="hidden" name="action" value="add_room" />

		<table id='formtable' class='imagetable'>
			<tr>
				<th colspan='2' class='tableTitle'>Create new room</th>
			</tr>
 			<tr>
 				<th>* Room Name (ex. "BANN-305")</th>
				<th>Action</th>
  			</tr>
 			<tr>
 				<td><input type='text' name='roomName_new' required /></td>
  				<td colspan='2' id='formButtons'>
			  		<input type='submit' value="Add Room" />
 				</td>
			</tr>
		</table>
    </form>
	<br>
	<br>
	<table id='displaytable' class='imagetable'>
		<tr>
			<th colspan='2' class='tableTitle'>Rooms List</th>
		</tr>
		<tr>
			<th>Room Name</th>
			<th>Action</th>
		</tr>
		<?php foreach ($rooms as $room) : ?>
		<tr>
			<td><?php echo $room->getLocation(); ?></td>
			<td>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="edit_room" />
					<input type="hidden" name="room_id" value="<?php echo $room->getRoom_id(); ?>" />
                    <input type="submit" value="Edit" />
                </form>
				<form class='inline' method='post' action='index.php'>
					<input type="hidden" name="action" value="delete_room" />
					<input type="hidden" name="room_id" value="<?php echo $room->getRoom_id(); ?>" />
                    <input type="submit" value="Delete" />
                </form>
			</td>			
		</tr>
		<?php endforeach; ?>
	</table>
	
</div> <!-- #content --> 

<?php include '../view/footer.php'; ?>