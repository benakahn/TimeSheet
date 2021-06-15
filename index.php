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
	<nav>
		<a href="changepsw.php">Change Password</a>
		<a href="logout.php">Logout</a>
	</nav>
<h1>Welcome to website</h1>
<?php require 'conn.php';
	$query1 = mysqli_query($conn, "SELECT * FROM `empl` WHERE `empId`='$_SESSION[id]'");
	$fetch1 = mysqli_fetch_array($query1);
	$_SESSION['clg'] = $fetch1['clg'];
	$_SESSION['branch'] = $fetch1['branch'];
	$_SESSION['empType'] = $fetch1['empType'];
	$_SESSION['empName'] = $fetch1['empName'];

	?>
	<form method="post" action="">
<label>Name : </label>
<input type="text" name="empName" value="<?php echo $_SESSION['empName'];?>" disabled>
	<br><br>
	<label>clg : </label>
<input type="text" name="clg" value="<?php echo $_SESSION['clg'];?>" disabled>
	<br><br>
<label>Type : </label>
<input type="text"  value="<?php echo $_SESSION['empType'];?>" disabled>
	<br><br>
<label>Branch : </label>
<input type="text" value="<?php echo $_SESSION['branch'];?>" disabled>
<br><br>
<label>Hrs : </label>
<input type="number" name="hrs" placeholder="0" required="">
<br><br>
<label>Date : </label>
<input type="date" name="date" placeholder="dd-mm-yyyy" required="">
<br><br>
<label>Note : </label>
<textarea></textarea>
<br><br>
<input type="submit" name="insert" value="Submit">
&nbsp;&nbsp;&nbsp;
<input type="reset" name="clr">
</form>
<?php
if(isset($_POST['insert'])){
$empId = $_SESSION['id'];
$name= $_SESSION['name'];
$hrs = $_POST["hrs"];
$date = $_POST["date"];
//INSERT INTO events (uid,etype,eaddress) VALUES ('$uid','$etype','$eaddress')"
	require 'conn.php';
	$sql = "INSERT INTO timesheet (empId,empName,hrs,`date`) VALUES ('$empId','$name','$hrs','$date')";
	if(mysqli_query($conn,$sql))
	{
		
		echo "<script>alert('inserted')</script>";
	}
	else
	{
		echo "<script>alert('404.....!!!')</script>";

	}
	header("refresh:2; url=index.php");
}
?>
<br><br>

<table border="1">
	<style>
	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php
	include 'conn.php';
	$id = $_SESSION['id'];
	$query2 =  "SELECT * FROM `timesheet` WHERE `empId` = '$id'";
	$result =  mysqli_query($conn,$query2);
	if($result-> num_rows > 0)
	{echo "<tr><th>Slno</th><th>EmpID</th><th>Name</th><th>Date</th><th>Hrs</th></tr>";
		while ($row = $result-> fetch_assoc())
		{
			echo "<tr><td>".$row['slno']."</td><td>".$row['empId']."</td><td>".$row['empName']."</td><td>".$row['date']."</td><td>".$row['hrs']."</tr>";
		}
	}
?>
</table>
</body>
</html>