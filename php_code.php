<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'edit-delete');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

// to delete information
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}
