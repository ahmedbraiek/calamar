<?php
require("connect.php");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$req = "select * from saison";
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
                    title: "Pas D Enregistrement",
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
            <table class="content-table" width="500">
                <thead>
                    <tr>
                        <th width="200" align="center">Saison</th>
                        <th width="100">Modifier</th>
                        <th width="100">Supprimer</th>
                    </tr>
                </thead>
                <tbody>';
while ($t = mysqli_fetch_array($res)) {
    echo '<tr>
                        <td width="200" align="center">' . $t["saison"] . '</td>
                        <form method="post" action="mdf1.html">
                        <td width="100"><font color="#000066" size="4"><button type="submit" style="font-size: 14pt; color: #570f0f" name="mdf"  value="' . $t["idsaison"] . '">Modifier</button></font></td>
                        </form>
                        <form method="post" action="supp2.php">
                        <td width="100"><button type="submit" style="font-size: 14pt; color: #570f0f" name="supp"  value="' . $t["idsaison"] . '">Supprimer</button></td>
                        </form>
                        
                    </tr>';
}