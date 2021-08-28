<?php
require("connect.php");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$email = $_POST["email"];
$mdp1 = $_POST["mdp1"];
$mdp = $_POST["mdp"];

$req = "select * from admin where email='$email' and passad='$mdp1'";
$res = mysqli_query($connect, $req);
if (mysqli_num_rows($res) > 0) {
	$req = "UPDATE admin SET passad='$mdp' where email='$email' and passad='$mdp1'";
	$res = mysqli_query($connect, $req);
	echo '
		<!DOCTYPE html>
		<html lang="en">
		
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title></title>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<link rel="stylesheet" href="style.css">
		</head>
		
		<body>
			<h1></h1>			
		
			<script>
			  	
				 
					swal({
						title: "Mis a Jour Avec Success",
						icon: "success",
					})
					.then((ok) => {
						window.location.href="menu2.html";
					});
							
			</script>
		</body>
		
		</html>';
		die("");
}
echo '<body style="background-color:black;"><br><br><br><br><br><br><br><br><br><bR><br><br>
		      <center><b><h1><big><big><big><big><font color="#9f0606">Mot de Passe ou E-mail Incorrecte ???</big></big></big></big></h1></b></center>
		      </body>
		       </html>';
die("");