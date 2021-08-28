<?php
session_start();
?><?php
	require("connect.php");
	$nbt = 0;
	$nbq = 0;
	$nbp = 0;
	$p1 = 0;
	$p2 = 0;

	$id = $_SESSION['id'];

	$req = "select email from  user1 where iduser='$id' ";
	$res = mysqli_query($connect, $req);
	$nom = mysqli_fetch_array($res);

	$nom = $nom["email"];
	$ids = $_SESSION['saison'];

	$req = "select * from  enregistrement1 where iduser='$id' and ids='$ids' order by date ";
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
						title: "Pas D Enregistrement ???",
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


	echo '<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	  <link rel="stylesheet" href="st1.css">
	  
	</head>
		  
	<body>
	
	<div align="center">
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
    </tr>
	</div>

	<table class="content-table" width="1250">
	  <thead>
		<tr>
		  <th width="100" style="text-align: center"><font color="#000080">Date</font></th>
		  <th width="50" style="text-align: center"><font color="#000080"><b>Quantite</b></font></th>
		  <th width="110" style="text-align: center"><font color="#000080"><b>Poids</b></font></th>
		  <th width="100" style="text-align: center"><font color="#000080">Etat de Mer</font></th>
		  <th width="50" style="text-align: center"><font color="#000080">Vent</font></th>
		  <th width="50" style="text-align: center"><font color="#000080"><b>Courant</b></font></th>
		  <th width="110" style="text-align: center"><font color="#000080"><b>Elmad w Jazr
				</b></font></th>
		  <th width="50" style="text-align: center"><font color="#000080"><b>Lune</b></font></th>
		  <th width="200" style="text-align: center"><font color="#000080"><b>Details</b></font></th>
		  <th width="90" style="text-align: center"><font color="#000080"><b>Supprimer</b></font></th>
		</tr>
	  </thead>
	  <tbody>';
	while ($t = mysqli_fetch_array($res)) {
		echo '
	  <tr>
		  <td width="100" height="50" style="text-align: center">' . $t["date"] . '</td>
		  <td width="50" height="50" style="text-align: center">' . $t["qunatite"] . '</td>
		  <td width="110" height="50" style="text-align: center" >' . $t["poids"] . '</td>
		  <td width="100" height="50" style="text-align: center">' . $t["etatmer"] . '</td>
		  <td width="50" height="50" style="text-align: center">' . $t["vent"] . '</td>
		  <td width="50" height="50" style="text-align: center">' . $t["courant"] . '</td>
		  <td width="110" height="50" style="text-align: center">' . $t["flux"] . '</td>
		  <td width="50" height="50" style="text-align: center">' . $t["lune"] . '</td>
		  <td width="200" height="50" style="text-align: center">' . $t["details"] . '</td>
		  <form method="post" action="supp.php">
		  <td width="90"  align="center"><button type="submit" style="font-size: 14pt; color: #000000" name="supp"  value="' . $t["id"] . '">Supprimer</button></td>
			  </form>
		  </tr>';
		$nbt = $nbt + 1;
		$nbq = $nbq + $t["qunatite"];
		$nbp = $nbp + $t["poids"];
	}

	$p1 = $nbq / $nbt;
	$p2 = $nbp / $nbt;
	echo '<tr>
		  <td width="116" height="50" align="center">
			<p><font size="4" color="#CC0000">Total Jours</font></td>
		  <td width="84" height="50" align="center"><font size="4" color="#CC0000">Total Qt</font></td>
		  <td width="110" height="50" align="center">
			<p align="center"><font size="4" color="#CC0000">Total Poids</font></td>
		  <td width="751" height="100" colspan="5" rowspan="2">&nbsp;</td>
		  </tr><tr>
		  <td width="116" height="50" style="text-align: center">' . $nbt . '</td>
		  <td width="84" height="50" style="text-align: center">' . $nbq . '</td>
		  <td width="110" height="50" style="text-align: center">' . $nbp . '</td>
		  </tr></div>
	<div align="center">
	<table class="content-table" width="434">
	  <thead>
		<tr>
		  <th width="183"><font color="#660066">Moyenne Qt par Jour</font></th>
		  <th width="191"><font color="#660066">Moyenne Poids par Jours</font></th>
		</tr>
	  </thead>
	  <tbody><tr>
		  <td width="183" height="50" style="text-align: center">' . number_format($p1, 1) . '</td>
		  <td width="191" height="50" style="text-align: center">' . number_format($p2, 1) . '</td>
		  </tr></div>
		  </table>
		  </body>
		  </html>
	';