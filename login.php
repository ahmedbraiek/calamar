<?php
session_start();
?>

<?php

require("connect.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
/*session_start();
	session_destroy();
	header('Location: index1.html');
	exit;*/
$email = $_POST["email"];
$pass = $_POST["pass"];
$saison = $_POST["saison"];

$req = "select * from user1 where email='$email' and pass='$pass'";
$res = mysqli_query($connect, $req);
if (mysqli_num_rows($res) > 0) {

  $req1 = "select iduser from user1 where email='$email' and pass='$pass'";
  $res1 = mysqli_query($connect, $req1);
  $iduser = mysqli_fetch_array($res1);

  $id = $iduser["iduser"];

  $_SESSION['user'] = $email;
  $_SESSION['mdp'] = $pass;
  $_SESSION['id'] = $id;

  $_SESSION['saison'] = $saison;


  echo '<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Type d Entrer</title>
  <link rel="stylesheet" href="style.css">
</head>
  	
<body>
<body background="g.jpg">


  <div class="wrapper">
    <header><font color="white">Type d Entree</font></header>
  	<br>
    
    <form name="f" action="menu2.html"">
     
      <input type="submit" value="Ordinateur" >
	  
    </form>
    
    <form name="f" action="menu1.html"">
     
      <input type="submit" value="SmartPhone" >
	  
    </form>
  
</body>


</html>';


  die("");
}

$req = "select * from admin where email='$email' and passad='$pass'";
$res = mysqli_query($connect, $req);
if (mysqli_num_rows($res) > 0) {

  $_SESSION['user'] = $email;
  $_SESSION['mdp'] = $pass;

  echo '<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Type d Entrer</title>
  <link rel="stylesheet" href="style.css">
</head>
  	
<body>
<body background="g.jpg">


  <div class="wrapper">
    <header><font color="white">Type d Entree</font></header>
  	<br>
    <form name="f" action="menu2.html"">
     
      <input type="submit" value="Ordinateur" >
	  
    </form>
    
    <form name="f" action="menu1.html"">
     
      <input type="submit" value="SmartPhone" >
	  
    </form>
  
</body>


</html>';


  die("");
}


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
						title: "Mot de Passe Ou User Incorrecte?",
						icon: "warning",
					})
					.then((ok) => {
						window.location.href="login.php";
					});
							
			</script>
		</body>
		
		</html>';
		die("");
?>