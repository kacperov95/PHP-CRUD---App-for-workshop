<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>

<style>
    input[type=submit] {
    background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 22px;
  text-decoration: none;
  margin-left: 46%;
  margin-top: 20px;
  cursor: pointer;

}

input[type=text] {
    text-align: center;
}

table {
  background: #4d5757;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td {
  border: 0px solid #3D3D3B;
  text-align: center;
  padding: 8px;
}

h1 {color: white;}
</style>

<h1>Czy na pewno chcesz usunąć swoje konto?<br>
        <br>Jeśli wybierzesz "TAK", wrócisz do ekranu logowania.</h1>
        <form action="self_delete_user.php" method="post">       
<table>
    <tr>
        <th>

            <input type="radio" id="dec1" name="dec" value='TAK'>
            <label for="dec1">TAK</label><br>
            <input type="radio" id="dec2" name="dec" value='NIE'>
            <label for="dec2">NIE</label><br>   



        </th>
    </tr>
</table>

<input type = "submit" value = "Zatwierdź">
<?php
if ($_SESSION['user_priviligies'] == 1) {
        echo "<a href=\"../admin_nav/users_manager.php\" class=backButton>Wróć do menu</a>";
    } else {
        echo "<a href=\"../user_nav/users_manager.php\" class=backButton>Wróć do menu</a>";
    }
?>


</body>
</html>