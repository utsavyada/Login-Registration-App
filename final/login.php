<?php 
if(isset($_POST['submit'])  && isset($_POST['username'])   && isset($_POST['password'])){ 	
				include"dbconnection.php";
				$username = $_POST['username'];
				$password = $_POST['password'];
				$sql = "SELECT * FROM employee2 WHERE username='$username'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) == 1) {
					header("Location: home.php");
					exit;
				} else {
					header("Location:login.php");
					exit;
				}
				}
				?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Form</title>
		<link rel="stylesheet" type="text/css" href="external3.css">
	</head>
	<body>
		<div>
			<label for="username">Username:</label>
			<input type="text" id="username" required>
		</div>
		<div >
			<label for="password">Password:</label>
			<input type="password" id="password" required>
		</div>
		<div>
			<button onclick="submitForm()">Submit</button>
		</div>
		<script>
			function submitForm(){
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var xhr = new XMLHttpRequest();
			var url = "login.php";
			var params = "username="+username+"&password="+password+"&submit=true";
			xhr.open("POST", url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function() {
			if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) { 
				 window.location.href = "home.php";
				} else if(xhr.readyState == XMLHttpRequest.DONE && xhr.status != 200) {
				alert("Invalid username or password");
				}
				}
				xhr.send(params);
				}
		</script>
    </body>
		
</html>
