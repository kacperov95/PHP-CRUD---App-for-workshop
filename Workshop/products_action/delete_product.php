<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>

<?php
if (isset($_GET["product_id"]))
{
    $conn = connectOracle();
    $stm = oci_parse($conn, "delete from product_card where product_id = :id");
    oci_bind_by_name($stm, ":id",$_GET["product_id"]);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
    
    header("Location: ../admin_nav/products_manager.php");
    }   
else {
    echo "<section>Błąd! Akcja nieudana<br>Skontaktuj się z administratorem.</section>";
    echo "<a href=\"../admin_nav/products_manager.php\" class=backButton>Wróć bez aktualizacji</a>";
    }

?>