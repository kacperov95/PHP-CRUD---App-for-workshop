<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
        background: #161e1e }
section {
    background: #4d5757;
    color: white;
    border-radius: 1em;
    padding: 1em;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%) }
input[type=submit] {
    background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 22px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 350px;
}

td, th {
  border: 0px;
  text-align: center;
  pdding: 8px;
}


</style>
</head>
<body>
<form action="login.php" method="post">
<section>
<table>
    <tr>
        <th></th>
        <th><p><?php

            if (isset($_SESSION['user_name']))
            {
                echo "Jesteś zalogowany jako ";
                echo $_SESSION['user_name'];
                echo
                "\nJeśli nie jesteś " ;
                echo $_SESSION['user_name']; 
                echo " użyj swojego loginu i hasła\nby zmienić użytkownika";
            } else {
                echo "Jesteś niezalogowany!";
            }
    
            ?>
        </th>
        <th></th>
    <tr>
          <th>Login</th>
          <th><input type = "text" name="login"><br></th>
          <th></th>
    </tr>
    <tr>
          <th>Hasło</th>
          <th><input type = "password" name="haslo"><br></th>
          <th></th>
    </tr>
    <tr>
      
    <th></th>
        <th><?php
if (isset($_SESSION['error']))
{
    echo "<p style=\"color: red;\">{$_SESSION['error']}</p>";
    unset ($_SESSION['error']);
}
?><br><input type = "submit" value = "Zaloguj"></th>
        <th></th>
    </tr>
</table>
</section>

    </body>
</html> 


