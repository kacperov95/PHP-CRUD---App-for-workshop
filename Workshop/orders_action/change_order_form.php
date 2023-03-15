<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>



<?php
if (!isset($_GET['order_id'])) {
    header("Location: ../login_form.php");
    die();
}
$conn = connectOracle();

$stm = oci_parse($conn, "select order_id, contractor_order_id, contractor_id, product_id, quantity, order_date, realization_date, status_id
                            from orders
                                where order_id = :id");
oci_bind_by_name($stm, ":id",$_GET['order_id']);

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
        <form action="change_order.php" method="post">
        <input type = "hidden" name="order_id" value="<?php echo $row[0]?>">
<table>
    <tr>
        <th>Kod zamówienia kontrahenta</th>
        <th>ID kontrahenta</th>
        <th>ID produktu</th>
        <th>Ilość (szt.)</th>
        <th>Data zamówienia<br>(RR/)</th>
        <th>Ostateczny termin realizacji</th>
        <th>Status</th>
    </tr>
    <tr>
        <th><input type = "text" name="contractor_order_id" value="<?php echo $row[1]?>"></th>
        <th><input type = "number" name="contractor_id" value="<?php echo $row[2]?>"></th>
        <th><input type = "number" name="product_id" value="<?php echo $row[3]?>"></th>
        <th><input type = "number" name="quantity" value="<?php echo $row[4]?>"></th>
        <th>Obecna data: <?php echo $row[5]?><br><input type = "date" name="order_date"></th>
        <th>Obecna data: <?php echo $row[6]?><br><input type = "date" name="realization_date" ></th>
        <th>
        <?php if($row[7] == 1) {
            echo " <input type=\"radio\" id=\"status1\" name=\"order_status\" value=1 checked>
            <label for=\"status1\">Zakończone</label><br>
            <input type=\"radio\" id=\"status2\" name=\"order_status\" value=2>
            <label for=\"status2\">W trakcie</label><br>
            <input type=\"radio\" id=\"status3\" name=\"order_status\" value=3>
            <label for=\"status3\">Nowe</label><br>";
        }
            if($row[7] == 2) {
                echo " <input type=\"radio\" id=\"status1\" name=\"order_status\" value=1>
            <label for=\"status1\">Zakończone</label><br>
            <input type=\"radio\" id=\"status2\" name=\"order_status\" value=2 checked>
            <label for=\"status2\">W trakcie</label><br>
            <input type=\"radio\" id=\"status3\" name=\"order_status\" value=3>
            <label for=\"status3\">Nowe</label><br>";
            }
            if($row[7] == 3) {
                echo " <input type=\"radio\" id=\"status1\" name=\"order_status\" value=1>
                <label for=\"status1\">Zakończone</label><br>
                <input type=\"radio\" id=\"status2\" name=\"order_status\" value=2>
                <label for=\"status2\">W trakcie</label><br>
                <input type=\"radio\" id=\"status3\" name=\"order_status\" value=3 checked>
                <label for=\"status3\">Nowe</label><br>";
            }
        ?>    
    </tr>
</table>

<input type = "submit" value = "Aktualizuj">

<a href="../admin_nav/orders_manager.php" class=backButton>Wróć bez aktualizacji</a>
</body>
</html>