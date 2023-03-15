<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>



<?php
if (!isset($_GET['product_id'])) {
    header("Location: ../login_form.php");
    die();
}
$conn = connectOracle();

$stm = oci_parse($conn, "select p.product_id, p.product_code, p.product_name, p.product_pressed, f.finish_name, p.product_weight 
from product_card p, finish_kind f 
where p.product_id = :id and p.product_finish = f.finish_id");
oci_bind_by_name($stm, ":id",$_GET['product_id']);

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
        <form action="change_product.php" method="post">
        <input type = "hidden" name="product_id" value="<?php echo $row[0]?>">
<table>
    <tr>
        <th>Kod produktu</th>
        <th>Nazwa produktu</th>
        <th>Przetłoczenie</th>
        <th>Powłoka</th>
        <th>Waga (kg)</th>
    </tr>
    <tr>
        <th><input type = "text" name="product_code" value="<?php echo $row[1]?>"></th>
        <th><input type = "text" name="product_name" value="<?php echo $row[2]?>"></th>
        <th> <?php if($row[3] == 1) {
            echo "<input type=\"radio\" id=\"press1\" name=\"product_pressed\" value=1 checked>
            <label for=\"press1\">Tak</label><br>
            <input type=\"radio\" id=\"press2\" name=\"product_pressed\" value=0>
            <label for=\"press2\">Nie</label><br>";
        } else {
            echo "<input type=\"radio\" id=\"press1\" name=\"product_pressed\" value=1>
            <label for=\"press1\">Tak</label><br>
            <input type=\"radio\" id=\"press2\" name=\"product_pressed\" value=0 checked>
            <label for=\"press2\">Nie</label><br>";
        } ?>
        </th>
        <th> 
        <?php if($row[4] == 'Satyna') {
            echo " <input type=\"radio\" id=\"finish1\" name=\"product_finish\" value='1' checked>
            <label for=\"finish1\">Satyna</label><br>
            <input type=\"radio\" id=\"finish2\" name=\"product_finish\" value='2'>
            <label for=\"finish2\">Czerń</label><br>
            <input type=\"radio\" id=\"finish3\" name=\"product_finish\" value='3'>
            <label for=\"finish3\">Nikiel</label><br>";
        }
            if($row[4] == 'Czern') {
                echo "<input type=\"radio\" id=\"finish1\" name=\"product_finish\" value='1'>
                <label for=\"finish1\">Satyna</label><br>
                <input type=\"radio\" id=\"finish2\" name=\"product_finish\" value='2' checked>
                <label for=\"finish2\">Czerń</label><br>
                <input type=\"radio\" id=\"finish3\" name=\"product_finish\" value='3'>
                <label for=\"finish3\">Nikiel</label><br>";
            }
            if($row[4] == 'Nikiel') {
            echo " <input type=\"radio\" id=\"finish1\" name=\"product_finish\" value='1'>
            <label for=\"finish1\">Satyna</label><br>
            <input type=\"radio\" id=\"finish2\" name=\"product_finish\" value='2'>
            <label for=\"finish2\">Czerń</label><br>
            <input type=\"radio\" id=\"finish3\" name=\"product_finish\" value='3' checked>
            <label for=\"finish3\">Nikiel</label><br>";
            }
        ?>


           
            
        </th>
        <th><input type = "number" step = "1" min = '1' max = "99999" name="product_weight" value="<?php echo $row[5]?>"></th>

    </tr>
</table>

<input type = "submit" value = "Aktualizuj">
<a href="../admin_nav/products_manager.php" class=backButton>Wróć bez aktualizacji</a>
</body>
</html>