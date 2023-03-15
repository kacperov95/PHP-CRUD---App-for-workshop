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

<h1>Dodawanie nowego kontrahenta <br><br><br>
<h2>Wprowadź dane w prawidłowych formatach.
        <br>Jeśli wprowadzisz nieprawidłowe dane, nie nastąpią żadne zmiany.</h2>
        <form action="add_contractor.php" method="post">
        <input type = "hidden" name="contractor_id" value="<?php echo $row[0]?>">
<table>
    <tr>
        <th>Nazwa</th>
        <th>Nazwa skrócona (maks. 10 znaków)</th>
        <th>NIP (10 cyfr)</th>
    </tr>
    <tr>
        <th><input type = "text" name="contractor_name" value="nazwa kontrahenta"></th>
        <th><input type = "text" name="contractor_acronym" value="akronim kontrahenta"></th>
        <th><input type = "text" name="contractor_nip" value="numer NIP"></th>

    </tr>
</table>

<input type = "submit" value = "Dodaj">

<br><br><a href="../admin_nav/contractors_manager.php" class=backButton>Wróć bez dodawania</a>
</body>
</html>