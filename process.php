<?php 
	session_start();
	require('practice_connection.php');

	if(isset($_GET['action']) && $_GET['action'] == 'add')
	{
		add_reservation($_POST);
	}
	elseif(isset($_GET['action']) && $_GET['action'] == 'delete')
	{
		header("location: delete.php?id={$_GET['id']}");
		die();
	}
	elseif(isset($_GET['action']) && $_GET['action'] == 'confirm_delete')
	{
		delete_reservation($_GET['id']);
	}

	function add_reservation($post)
	{
		$contact = escape_this_string($post['contact']);
		$phone_number = escape_this_string($post['phone_number']);
		$query = "INSERT INTO reservations (contact, number_of_guests, phone_number, seated, created_at, updated_at) 
		VALUES ('{$contact}', {$post['num_of_guests']}, '{$phone_number}', {$post['seated']}, NOW(), NOW())";
		run_mysql_query($query);
		$_SESSION['success'] = "New reservation added!";
		header('location: index.php');
		die();
	}

	function delete_reservation($id)
	{
		$query = "DELETE FROM reservations WHERE id = {$id}";
		run_mysql_query($query);
		header('location: index.php');
		die();
	}
 ?>