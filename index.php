<?php
	session_start();
	require('practice_connection.php');
	$query = "SELECT * FROM reservations";
	$reservations = fetch_all($query);
 ?>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 		*
 		{
 			font-family: sans-serif;
 		}
 	</style>
 </head>
 <body>
 	<h1>AN APP YOU ACTUALLY KNOW HOW TO BUILD</h1>
 	<table>
 		<thead>
 			<th>Contact name</th>
 			<th>Num of Guests</th>
 			<th>Phone number</th>
 			<th>Reservation made at</th>
 			<th>Seated</th>
 			<th>DELETE</th>
 			<th>Edit</th>
 		</thead>
 		<?php 
 			foreach ($reservations as $reservation) 
 			{
 				echo 
 				"<tr>
 					<td>{$reservation['contact']}</td>
 					<td>{$reservation['number_of_guests']}</td>
 					<td>{$reservation['phone_number']}</td>
 					<td>{$reservation['created_at']}</td>
 					<td>{$reservation['seated']}</td>
 					<td><a href='process.php?action=delete&id={$reservation['id']}'>DELETE THIS RESERVATION</a></td>
 					<td><a href='process.php?action=edit&id={$reservation['id']}'>EDIT</a></td>
 				</tr>";
 			}
 		 ?>
 	</table>
 	<?php 
 		if(isset($_SESSION['success']))
 		{
 			echo "<p>{$_SESSION['success']}</p>";
 			unset($_SESSION['success']);
 		}
 	 ?>
 	<h2>Make a new reservation!!!</h2>
 	<form action='process.php?action=add' method='post'>
 		Name:<input type='text' name='contact'>
 		Phone Number:<input type='text' name='phone_number'>
 		Number of guests:<input type='number' name='num_of_guests'>
 		Yes:<input type='radio' name='seated' value='true'>
 		No:<input type='radio' name='seated' value='false'>
 		<input type='submit' value='add reservation!'>
 	</form>
 </body>
 </html>
