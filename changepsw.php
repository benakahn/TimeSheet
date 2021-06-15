<?php
include 'conn.php';
session_start();
if(!$_SESSION['demo']){
	$url='abc.php';
	header("Location:".$url);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="">
<label>Current Psw : </label>
<input type="password" name="cpsw" placeholder="Enter current password" required="">
<br><br>
<label>New Psw : </label>
<input type="password" name="npsw" placeholder="Enter new password" required="">
<br><br>
<input type="submit" name="upd" value="Update">
<input type="reset" value="Reset">
</form>
<?php
require 'conn.php';
if(isset($_POST['upd']))
{
	$cpsw = $_POST['cpsw'];
	$cpsw1 = $_SESSION['psw'];
	$id = $_SESSION['id'];
	$npsw = $_POST['npsw'];
	$hpsw = md5($npsw);
	if($cpsw == $cpsw1)
	{
		if($cpsw != $npsw){
		$sql = "UPDATE `empl` SET `emPsw` = '$npsw' WHERE `empId` = '$id'";
		if(mysqli_query($conn,$sql))
	{
		
		echo "<script>alert('Updated')</script>";
	}
	else
	{
		echo "<script>alert('404.....!!!')</script>";

	}
	header("refresh:2; url=index.php");
}
else{
	echo "<script>alert('aaa')</script>";
}
}
else{
	echo "<script>alert('Please enter current password')</script>";
}
}
?>
</body>
</html>