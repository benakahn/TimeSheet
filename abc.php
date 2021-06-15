<!DOCTYPE html>
<html>
<head>
	<title>Demo website</title>
</head>
<body>
<form method="post" action="">
	<table>
		<tr>
			<th>
				Empl ID :
			</th>
			<th>
				psw:
			</th>
		</tr>
		<tr>
			<td>
				<input type="text" name="empID" placeholder="Empl ID" required="">
			</td>
			<td>
				<input type="Password" name="psw" placeholder="Password" required="">
			</td>
		</tr>
		<tr></tr>
		<tr>
			<td>
				<input type="submit" name="log" value="Login">
			</td>
			<td>
				<input type="reset" name="clear" value="Clear">
			</td>
		</tr>
		<tr></tr>
		
	</table>
</form>
<?php
	include 'conn.php';

if(isset($_POST["log"])){
	$empID=$_POST["empID"];
	$psw=$_POST["psw"];
	// $hpsw=md5($psw);

	$sql = "SELECT * FROM empl WHERE empId = '$empID' AND emPsw ='$psw'";
 $result = mysqli_query($conn,$sql);
   
    $row = mysqli_fetch_array($result);
    $url = 'index.php';
	if($row > 0){
     	session_start();
    	$_SESSION['demo']='true';
    	$_SESSION['id']=$row["empId"];
    	$_SESSION['psw']=$row["emPsw"];
    	$_SESSION['name']=$row["empName"];
      	echo "Login successfull";
      	header("Location:".$url);
    }
    else{
    	echo "<script>alert('User Failed to LOGIN!!!')</script>";
    }
    mysqli_close($conn);
}

?>
</body>
</html>