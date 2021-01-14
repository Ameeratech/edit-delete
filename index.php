<?php  include('php_code.php'); ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
</head>
<body>

<!-- This code displays a confirmation message to tell the user that a new record has been created in the database.  -->
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<!-- To retrieve the database records and display them on the page, add this code immediately above the input form: -->
<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td>
				<a href="edit.php?id=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="index.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form method="post">

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['address'];
		
	}
?>

<!-- <button class="btn" type="submit" name="save" >save</button> -->
<?php if ($update == true): ?>
<!-- // newly added field -->
<!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->

<!-- // modified form fields -->
<input type="text" name="name" value="<?php echo $name; ?>">
<input type="text" name="address" value="<?php echo $address; ?>">
	<button class="btn" type="submit" name="update" style="background: yellow;"> update</button>
<!-- <?php else: ?> -->
	<!-- <button class="btn" type="submit" name="save" >Save</button> -->
<?php endif ?>

</form>
</html>