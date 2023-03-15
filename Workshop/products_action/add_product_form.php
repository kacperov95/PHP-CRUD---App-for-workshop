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

<h1>Dodawanie nowego produktu <br><br><br>
<h2>Wprowadź dane w prawidłowych formatach.
        <br>Jeśli wprowadzisz nieprawidłowe dane, nie nastąpią żadne zmiany.</h2>
        <form action="add_product.php" method="post">
        <input type = "hidden" name="product_id" value=NULL>
<table>
    <tr>
        <th>Kod produktu</th>
        <th>Nazwa produktu</th>
        <th>Przetłoczenie</th>
        <th>Powłoka</th>
        <th>Waga (kg)</th>
    </tr>
    <tr>
        <th><input type = "text" name="product_code" value="kod"></th>
        <th><input type = "text" name="product_name" value="nazwa"></th>
        <th> 
            <input type="radio" id="press1" name="product_pressed" value=1>
            <label for="press1">Tak</label><br>
            <input type="radio" id="press2" name="product_pressed" value=0>
            <label for="press2">NIE</label><br>
        </th>
        <th> 
            <input type="radio" id="finish1" name="product_finish" value=1>
            <label for="finish1">Satyna</label><br>
            <input type="radio" id="finish2" name="product_finish" value=2>
            <label for="finish2">Czerń</label><br>
            <input type="radio" id="finish3" name="product_finish" value=3>
            <label for="finish3">Nikiel</label><br>
        </th>
        <th><input type = "number" step = "0.001" name="product_weight" value=0></th>

    </tr>
</table>

<input type = "submit" value = "Dodaj">

<br><br><a href="../admin_nav/products_manager.php" class=backButton>Wróć bez dodawania</a>
</body>
</html>