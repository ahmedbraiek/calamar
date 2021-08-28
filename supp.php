<?php
require("connect.php");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	$id=$_POST["supp"];
	//$nomclass=$_POST["nomclass"];
	
	
			$req="DELETE FROM enregistrement1 where id='$id'";
			$res=mysqli_query($connect,$req);
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
							title: "Supprimer Avec Success",
							icon: "success",
						})
						.then((ok) => {
							window.location.href="menu2.html";
						});
								
				</script>
			</body>
			
			</html>';
			die("");