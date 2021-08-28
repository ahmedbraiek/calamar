<?php
session_start();
?>
<?php
require("connect.php");

$dated = $_POST["dated"];
$datef = $_POST["datef"];

$totj = 0;
$totq = 0;
$totp = 0;
$totpr = 0;

$id = $_SESSION['id'];
$ids = $_SESSION['saison'];

$req = "select email from user1 where iduser='$id' ";
$res = mysqli_query($connect, $req);
$nom = mysqli_fetch_array($res);
$nom = $nom["email"];


$req = "select * from  vente where  (date<='$datef' and date>='$dated') and iduser='$id' and ids='$ids' order by date  ";
$res = mysqli_query($connect, $req);
if (mysqli_num_rows($res) == 0) {
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
						title: "Pas D Enregistrement Ou verifier Date ?",
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


echo '<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	  <link rel="stylesheet" href="st1.css">
	  
	</head>
		  
	<body>
	
	<div align="center">
	<table class="content-table" width="233">
	  <thead>
		<tr>
		  <th width="203">
			<p style="text-align: center"><font color="#660066" size="3">Pecheur</font></th>
		</tr>
	  </thead>
	  <tbody><tr>
		  <td width="203" height="42" style="text-align: center">' . $nom . '</td>
		  </tr></div>
		  </table>
	<table class="content-table" width="911">
	  <thead>
		<tr>
		  <th width="124" style="text-align: center"><font color="#000080">Date</font></th>
		  <th width="90" style="text-align: center"><font color="#000080"><b>Quantite</b></font></th>
		  <th width="104" style="text-align: center"><font color="#000080"><b>Poids</b></font></th>
		  <th width="129" style="text-align: center"><font color="#000080">Prix</font></th>
		  <th width="314" style="text-align: center"><font color="#000080"><b>Details</b></font></th>
		  <th width="90" style="text-align: center">Supprimer</th>
		</tr>
	  </thead>
	  <tbody>';
while ($t = mysqli_fetch_array($res)) {
	echo '<tr>
		  <td width="124" height="50" style="text-align: center">' . $t["date"] . '</td>
		  <td width="90" height="50" style="text-align: center">' . $t["quantite"] . '</td>
		  <td width="104" height="50" style="text-align: center">' . $t["poids"] . '</td>
		  <td width="129" height="50" style="text-align: center" >' . $t["prix"] . '</td>
		  <td width="314" height="50" style="text-align: center">' . $t["details"] . '</td>
		  
		  <form method="post" action="supp1.php">
		  <td width="100"  align="center"><button type="submit" style="font-size: 14pt; color: #570f0f" name="supp"  value="' . $t["idvente"] . '">Supprimer</button></td>
			  </form>
		  </tr>';
	$totq = $totq + $t["quantite"];
	$totp = $totp + $t["poids"];
	$totpr = $totpr + $t["prix"];
}
echo '</div>
	<div align="center">
		<tr>
		  <td width="124" height="100" rowspan="2">&nbsp;</td>
		  <td width="90" height="50" style="text-align: center"><font size="4" color="#CC0000">Total Qt</font></td>
		  <td width="104" height="50" style="text-align: center" ><font size="4" color="#CC0000">Total Poids</font></td>
		  <td width="129" height="50" style="text-align: center">
			<p align="center"><font size="4" color="#CC0000">Total Prix</font></td>
		  <td width="314" height="100" rowspan="2">&nbsp;</td>
		  </tr><tr>
		  <td width="90" height="50" style="text-align: center">' . $totq . '</td>
		  <td width="104" height="50" style="text-align: center">' . $totp . '</td>
		  <td width="129" height="50" style="text-align: center">' . $totpr . '</td>
		  </tr>
		  </body>
		  </html>
	';


?>