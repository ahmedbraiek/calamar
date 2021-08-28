<?php
require("connect.php");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userad = $_POST["userad"];
$mdpad = $_POST["mdpad"];

$user = $_POST["user"];
$mdp = $_POST["mdp"];

$req = "select * from admin where email='$userad' and passad='$mdpad'";
$res = mysqli_query($connect, $req);
if (mysqli_num_rows($res) > 0) {
    $req = "select * from user1 where email='$user' and passad='$mdp'";
    $res = mysqli_query($connect, $req);
    if (mysqli_num_rows($res) == 0) {
        $req = "insert into user1 (email,pass) values ('$user','$mdp')";
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
						title: "Compte Ajouter Avec Success",
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
                    title: "Compte Deja Saisie?",
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
						window.location.href="menu2.html";
					});
							
			</script>
		</body>
		
		</html>';
		die("");