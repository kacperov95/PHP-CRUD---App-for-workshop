<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>



<?php

if ($_SESSION['user_priviligies'] == 1) { 
    if (!isset($_GET['user_id'])) {
        header("Location: ../general_librarie/destory.php");
        die();
    }
}

$conn = connectOracle();

$stm = oci_parse($conn, "select user_id, user_name, user_surname, user_login, user_password, user_priviligies from users where user_id = :id");

    oci_bind_by_name($stm, ":id",$_GET['user_id']);


if (oci_execute($stm)) { 
    $row = oci_fetch_row($stm);
}

oci_free_statement($stm);
oci_close($conn);
?>
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

<h1>Wprowadź nowe dane tylko w pola, które chcesz zmienić. 
        <br>Jeśli wprowadzisz nieprawidłowe dane, nie nastąpią żadne zmiany.</h1>
        <form action="change_user.php" method="post">
        <input type = "hidden" name="user_id" value="<?php echo $row[0];?>">
<table>
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Login</th>
        <th>Hasło</th>
        <?php if ($_SESSION["user_priviligies"] == 1) {echo "<th>Uprawnienia (1 - administrator/ 2 - użytkownik)</th>";}?>
    </tr>
    <tr>
        <th><input type = "text" name="user_name" value="<?php echo $row[1]?>"></th>
        <th><input type = "text" name="user_surname" value="<?php echo $row[2]?> "></th>
        <th><input type = "text" name="user_login" value="<?php echo $row[3]?>"></th>
        <th><input type = "password" name="user_password" value=""></th>
        
        <?php 
        if ($_SESSION["user_priviligies"] == 1) {
            if ($row[5] == 1) {
                echo "<th><input type=\"radio\" id=\"priviligies1\" name=\"user_priviligies\" value=1 checked>
                <label for=\"priviligies1\">Adminitrator</label><br>
                <input type=\"radio\" id=\"priviligies2\" name=\"user_priviligies\" value=2>
                <label for=\"priviligies2\">Użytkownik</label><br></th>";   
            } else {
                echo "<th><input type=\"radio\" id=\"priviligies1\" name=\"user_priviligies\" value=1>
                <label for=\"priviligies1\">Adminitrator</label><br>
                <input type=\"radio\" id=\"priviligies2\" name=\"user_priviligies\" value=2 checked>
                <label for=\"priviligies2\">Użytkownik</label><br></th>";   
            }  
        } else {
            echo "<input type=\"hidden\" name=\"user_priviligies\" value=2>";
        }
        
        
        ?> 
        
    </tr>
</table>

<input type = "submit" value = "Aktualizuj">
<?php
if ($_SESSION['user_priviligies'] == 1) {
        echo "<a href=\"../admin_nav/users_manager.php\" class=backButton>Wróć do menu</a>";
    } else {
        echo "<a href=\"../user_nav/users_manager.php\" class=backButton>Wróć do menu</a>";
    }
?>

</body>
</html>