<?php 
	var_dump($_GET);
	require('practice_connection.php');
	$query = "SELECT * FROM reservations WHERE id = {$_GET['id']}";
	$res = fetch_record($query);
 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<h1>Are you sure you want to delete this reservation???</h1>
 	<?php 
 		echo
 		"
 		<h3>Name: {$res['contact']}</h3>
 		<h3>Phone number: {$res['phone_number']}</h3>
 		<h3>Number of guests: {$res['number_of_guests']}</h3>
 		<h3>Created at: {$res['created_at']}</h3>
 		<a href='process.php?action=confirm_delete&id={$_GET['id']}'><button>YES</button></a>
 	 	<a href='index.php'><button>NO</button></a>
 		";
 	 ?>
 	 
 </body>
 </html>