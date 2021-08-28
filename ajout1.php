<?php
session_start();
?>
<?php
require("connect.php");
$date = $_POST["date"];
$qt = $_POST["qt"];
$p = $_POST["p"];
$prix = $_POST["prix"];
$details = $_POST["details1"];

$id = $_SESSION['id'];
$ids = $_SESSION['saison'];

$req = "select * from vente where quantite='$qt' and poids='$p' and iduser='$id' and ids='$ids' ";
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
						title: "Vente Deja Saisie?",
						icon: "warning",
					})
					.then((ok) => {
						window.location.href="menu2.html";
					});
							
			</script>
		</body>
		
		</html>';
		die("");
}
$req = "insert into vente (iduser,ids,date,quantite,poids,prix,details) values ('$id','$ids','$date','$qt','$p','$prix','$details')";
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
						title: "Vente Ajouter Avec Success",
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