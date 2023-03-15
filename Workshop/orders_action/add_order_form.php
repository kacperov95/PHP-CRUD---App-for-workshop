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

<h1>Dodawanie nowego zamówienia <br><br><br>
<h2>Wprowadź dane w prawidłowych formatach.
        <br>Jeśli wprowadzisz nieprawidłowe dane, nie nastąpią żadne zmiany.</h2>
        <form action="add_order.php" method="post">
        <input type = "hidden" name="order_id" value=NULL>
<table>
    <tr>
        <th>ID zamówienia kontrahenta</th>
        <th>ID kontrahenta</th>
        <th>ID produktu</th>
        <th>Ilość (szt.)</th>
        <th>Data zamówienia</th>
        <th>Ostateczna data realizacji</th>
        <th>Status zamówienia</th>
    </tr>
    <tr>
        <th><input type = "text" name="contractor_order_id" value=""></th>
        <th><input type = "text" name="contractor_id" value=""></th>
        <th><input type = "text" name="product_id" value=""></th>
        <th><input type = "number" min = "0" max = "9999" step = "1" name="quantity" value=""></th> 
        <th><input type = "date" name="order_date" value=""></th> 
        <th><input type = "date" name="realization_date" value=""></th> 
        <th> 
            <input type="radio" id="status1" name="order_status" value=1>
            <label for="status1">Zakończony</label><br>
            <input type="radio" id="status2" name="order_status" value=2>
            <label for="status2">W trakcie</label><br>
            <input type="radio" id="status3" name="order_status" value=3>
            <label for="status3">Nowy</label><br>
        </th>
    </tr>
</table>

<input type = "submit" value = "Dodaj">

<br><br><a href="../admin_nav/orders_manager.php" class=backButton>Wróć bez dodawania</a>
</body>
</html>