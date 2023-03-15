<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>
<?php 
if ($_SESSION['user_priviligies'] != 1) {
    header("Location: ../general_libraries/destroy.php");
}
?>

<?php include_once("../general_libraries/header.php"); ?>


<?php
if (isset($_SESSION['user_name'])) {
    $conn = connectOracle();
    $stm = oci_parse($conn, "select p.product_id, p.product_code, p.product_name, p.product_pressed, f.finish_name, p.product_weight from product_card p, finish_kind f where p.product_finish = f.finish_id order by product_id");
    if (oci_execute($stm)) { 

        echo "<table>
        <tr>
          <th>ID produktu</th>
          <th>Kod produktu</th>
          <th>Nazwa produktu</th>
          <th>Przetłoczenie</th>
          <th>Powłoka</th>
          <th>Waga produktu (g)</th>
          <th>Akcja</th>
        </tr>";
        
        
        while (($row = oci_fetch_row($stm)) != false)
        {

            echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>";
                if ($row[3] == 0 ) {
                    echo "Nie";
                } else {
                    echo "Tak";
                }
                
                
                
                echo "</td>
                <td>{$row[4]}</td>
                <td>{$row[5]}</td>
                <td><a href=\"../products_action/change_product_form.php?product_id={$row[0]}\" class=menuButton3>Edytuj</a>
                <a href=\"../products_action/delete_product.php?product_id={$row[0]}\" class=menuButton3>Usuń</a></td>
            </tr>";
        }
        echo "<tr><td><a href=\"../products_action/add_product_form.php\" class=menuButton>Dodaj nowy produkt</a></td></tr>";
        echo "</table>";
        
         
    }
}
else {
    header("Location: ../login_form.php");
}
?>
<a href="../general_libraries/destroy.php" class=logoutButton>Wyloguj</a>
        <a href="../admin_nav/menu.php" class=backButton>Wróć do menu</a>