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
<h1>Dodawanie nowego użytkownika <br><br><br>
<h2>Wprowadź dane w prawidłowych formatach.
        <br>Jeśli wprowadzisz nieprawidłowe dane, nie nastąpią żadne zmiany.</h2>
        <form action="add_user.php" method="post">
        <input type = "hidden" name="user_id" value=NULL>
<table>
    <tr>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Login</th>
        <th>Hasło</th>
        <th>Poziom uprawnień</th>
    </tr>
    <tr>
        <th><input type = "text" name="user_name" value=""></th>
        <th><input type = "text" name="user_surname" value=""></th>
        <th><input type = "text" name="user_login" value=""></th>
        <th><input type = "password" name="user_password" value=""></th>
        <th>
        <input type="radio" id="priviligies1" name="user_priviligies" value=1>
            <label for="priviligies1">Adminitrator</label><br>
            <input type="radio" id="priviligies2" name="user_priviligies" value=2>
            <label for="priviligies2">Użytkownik</label><br>
      
      </th>
    </tr>
</table>

<input type = "submit" value = "Dodaj">

<br><br><a href="../admin_nav/users_manager.php" class=backButton>Wróć bez dodawania</a>
</body>
</html>