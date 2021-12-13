<?php
	//include our connection
	include 'dbconfig.php';
 
	//get the row of selected id
	$sql = "SELECT rowid, * FROM members WHERE rowid = '".$_GET['id']."'";
	$query = $db->query($sql);
	$row = $query->fetchArray();
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD com PHP</title>
</head>
<body>
<form method="POST">
	<a href="index.php">Back</a>
	<p>
		<label for="firstname">Firstname:</label>
		<input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>">
	</p>
	<p>
		<label for="lastname">Lastname:</label>
		<input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>">
	</p>
	<p>
		<label for="idade">Idade:</label>
		<input type="number" id="idade" name="idade" value="<?php echo $row['idade']; ?>">
	</p>
	<p>
		<label for="address">Address:</label>
		<input type="text" id="address" name="address" value="<?php echo $row['address']; ?>">
	</p>
	<input type="submit" name="save" value="Save">
</form>
<?php
	if(isset($_POST['save'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
 
		//update our table
		$sql = "UPDATE members SET firstname = '$firstname', lastname = '$lastname', idade = '$idade', address = '$address' WHERE rowid = '".$_GET['id']."'";
		$db->exec($sql);
 
		header('location: index.php');
	}
?>
</body>
</html>