<?php  include('php_code.php'); 
if(count($_POST)>0) {
mysqli_query($db,"UPDATE info set  id='" . $_GET['id'] . "', name='" . $_POST['name'] . "', address='" . $_POST['address'] . "' WHERE id='" . $_GET['id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($db,"SELECT * FROM info WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>


<form  method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="index.php">info List</a>
</div>

Name: <br>
<input type="text" name="name"  value="<?php echo $row['name']; ?>">
<br>
address:<br>
<input type="text" name="address"  value="<?php echo $row['address']; ?>">
<br>

<input type="submit" name="submit" value="Submit" class="buttom">

</form>