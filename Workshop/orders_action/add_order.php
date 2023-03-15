<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>


<?php


if (
(isset($_POST["contractor_order_id"])) &&
(isset($_POST["contractor_id"])) && 
(isset($_POST["product_id"])) && 
(isset($_POST["quantity"])) && 
(isset($_POST["order_date"])) &&
(isset($_POST["realization_date"])) &&
(isset($_POST["order_status"]))
){
    echo "132";
    $conn = connectOracle();
    $stm = oci_parse($conn, "insert into orders values (NULL, :contractor_order_id, :contractor_id, :product_id, :quantities, :order_date, :realization_date, :order_status)");
    oci_bind_by_name($stm, ":contractor_order_id",$_POST["contractor_order_id"]);
    oci_bind_by_name($stm, ":contractor_id",$_POST["contractor_id"]);
    oci_bind_by_name($stm, ":product_id",$_POST["product_id"]);
    oci_bind_by_name($stm, ":quantities",$_POST["quantity"]);
    oci_bind_by_name($stm, ":order_date",$_POST["order_date"]);
    oci_bind_by_name($stm, ":realization_date",$_POST["realization_date"]);
    oci_bind_by_name($stm, ":order_status",$_POST["order_status"]);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}
header("Location: ../admin_nav/orders_manager.php");

?>