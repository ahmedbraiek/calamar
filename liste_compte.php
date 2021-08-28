<?php
require("connect.php");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$req = "select * from admin";
$res = mysqli_query($connect, $req);

$req1 = "select * from user1";
$res1 = mysqli_query($connect, $req1);



echo '<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
      <link rel="stylesheet" href="st1.css">
      
    </head>
          
    <body>
    
    <div align="center">
    <table border="0" width="42%" height="50">
        <tr>
            <td>
            <p align="center"><font size="6">Administrateur</font></td>
        </tr>
    </table>
    <table class="content-table" width="658">
      <thead>
        <tr>
          <th width="286">Nom Utilisateur</th>
          <th width="312">Mot de Passe</th>
        </tr>
      </thead>
      <tbody>';
while ($t = mysqli_fetch_array($res)) {
  echo '<tr>
          <td width="286">' . $t["email"] . '</td>
          <td width="312">' . $t["passad"] . '</td>
          </tr>';
}
echo '<table border="0" width="43%" height="50">
        <tr>
            <td>
            <p align="center"><font size="6">User</font></td>
        </tr>
    </table>
    <table class="content-table" width="658">
      <thead>
        <tr>
          <th width="286">Nom Utilisateur</th>
          <th width="312">Mot de Passe</th>
          <th width="100">Supprimer</th>
        </tr>
      </thead>
      <tbody>';
while ($t1 = mysqli_fetch_array($res1)) {
  echo '<tr>
              <td width="286">' . $t1["email"] . '</td>
              <td width="312">' . $t1["pass"] . '</td>
              <form method="post" action="supp_compte.php">
            <td width="100"><button type="submit" style="font-size: 14pt; color: #570f0f" name="supp"  value="' . $t1["iduser"] . '">Supprimer</button></td>
            </form>
              </tr>';
}
echo ' </table>
    <p>&nbsp;';