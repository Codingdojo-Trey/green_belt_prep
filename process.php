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
	elseif(isset($_GET['action']) && $_GET['action'] == 'edit')
	{
		header("location: edit.php?id={$_GET['id']}");
	}
	elseif(isset($_GET['action']) && $_GET['action'] == 'update')
	{
		update_reservation($_POST, $_GET['id']);
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

	function update_reservation($post, $id)
	{
		$query = "UPDATE reservations SET 
		number_of_guests = '{$post['num_of_guests']}',
		contact = '{$post['contact']}',
		phone_number = '{$post['phone_number']}',
		seated = {$post['seated']},
		updated_at = NOW()
		WHERE id = {$id}";
		run_mysql_query($query);
		$_SESSION['success'] = "Reservation successfully updated!";
		header('location: index.php');
		die();
	}
 ?>