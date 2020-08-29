<!DOCTYPE html>
<html>
<head>
	<title>Appt Maintainance Record</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
	body, html{				/*Setting to a 0 margin position so that no space is left*/
		margin: 0 auto;
		padding: 0;
		padding-top: 10px;

</style>

<?php

if(isset($_POST['btn'])){
	$dbhost = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "jplf";
			   
	$link = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

	if(!$link){
		echo "Not Connected::ERROR!".mysqli_connect_error()."<br>";
	}
	else{
				
		$fname = mysqli_real_escape_string($link, $_POST['fn']);
		$lname = mysqli_real_escape_string($link, $_POST['ln']);
		$recNum = mysqli_real_escape_string($link, $_POST['rn']);
		$month_num = mysqli_real_escape_string($link, $_POST['monthNum']);
		$flat_n = mysqli_real_escape_string($link, $_POST['flat']);
				
		$sql = "insert into maint_rd(LastName,FirstName,r_num,month_num, flat_num) values('$fname','$lname','$recNum','$month_num', '$flat_n')";

		if(mysqli_query($link, $sql)){
		    echo "<div class=container><div class=alert alert-success><strong>Success!</strong> Records added successfully</div></div>";
		}
		else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	} 
}

?>

<body>
	<center>
		<div class="container">
			<h1>Janapriya Lakefront C-Block</h1>
			<h4>Maintainance Committee</h4>

			<form method="POST" action="#" class="form">
				<label for="firstname">First Name</label>
				<div class="form-group">
					<input type="text" name="fn" class="form-control" placeholder="First Name*" required>
				</div>

				<label for="lastname">Last Name</label>
				<div class="form-group">
					<input type="text" name="ln" class="form-control" placeholder="Last Name">
				</div>

				<div class="form-group">
					<label for="recNum">Reciept Number</label>
					<input type="number" name="rn" placeholder="Reciept Number*" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="recNum">Month Of Payment</label>
					<input type="number" name="monthNum" min="1" max="12" class="form-control" placeholder="Month Of Payment*" required>
				</div>

				<div class="form-group">
					<label for="flatnum">Flat number (DO NOT INCLUDE 'C2-')</label>
					<input type="number" name="flat" placeholder="Falt Number*" class="form-control" maxlength="3" required>
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-md" name="btn">Submit</button>
				</div>
			</form>
		</div>

		<div style="background: #c0fad3;">
				<label for="madeBy">Designed By: Sai Nath. U</label>
		</div>

	</center>

</body>
</html>
