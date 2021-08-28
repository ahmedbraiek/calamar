<?php
session_start();
?>
<?php
require("connect.php");
$s = $_POST["saison"];

$req = "select * from saison where saison='$s' ";
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
					title: "Saison Deja Saisie?",
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
$req = "insert into saison (saison) values ('$s')";
$res = mysqli_query($connect, $req);
if (mysqli_affected_rows($connect) > 0) {
    echo '<body style="background-color:black;"><br><br><br><br><br><br><br><br><br><bR><br><br>
		<center><b><h1><big><big><big><big><font color="#31AC2F">Ajoute avec Succes </big></big></big></big></h1></b></center><br><br><br>
		
		</body>
		
		</html>';
    die("");
}

?>