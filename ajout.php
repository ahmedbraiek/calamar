<?php
session_start();
?>
<?php
require("connect.php");

$qt = $_POST["qt"];
$p = $_POST["p"];
$mer = $_POST["e"];
$vent = $_POST["v"];
$courant = $_POST["c"];
$flux = $_POST["fr"];
$lune = $_POST["L"];
$details = $_POST["details"];
$date = $_POST["date"];


$id = $_SESSION['id'];
$ids = $_SESSION['saison'];

$req = "select * from enregistrement1 where date='$date' and iduser='$id' and ids='$ids'";
$res = mysqli_query($connect, $req);
if (mysqli_num_rows($res) > 0) {
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
					title: "Date Deja Saisie?",
					icon: "warning",
				})
				.then((ok) => {
					window.location.href="menu2.html";
				});
						
		</script>
	</body>
	
	</html>';
	die("");
	die("");
}
$req = "insert into enregistrement1 (iduser,ids,qunatite,poids,etatmer,vent,courant,flux,lune,details,date) values ('$id','$ids','$qt','$p','$mer','$vent','$courant','$flux','$lune','$details','$date')";
$res = mysqli_query($connect, $req);
if (mysqli_affected_rows($connect) > 0) {
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
						title: "Ajouter avec Success",
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

?>