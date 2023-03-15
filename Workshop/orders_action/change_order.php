<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>


<?php


if ($_POST["contractor_order_id"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE orders SET contractor_order_id = :code where order_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["order_id"]);
    oci_bind_by_name($stm, ":code",$_POST['contractor_order_id']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["contractor_id"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE orders SET contractor_id = :code where order_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["order_id"]);
    oci_bind_by_name($stm, ":code",$_POST['contractor_id']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["product_id"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE orders SET product_id = :code where order_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["order_id"]);
    oci_bind_by_name($stm, ":code",$_POST['product_id']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["quantity"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE orders SET quantity = :code where order_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["order_id"]);
    oci_bind_by_name($stm, ":code",$_POST['quantity']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["order_date"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE orders SET order_date = :code where order_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["order_id"]);
    oci_bind_by_name($stm, ":code",$_POST['order_date']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["realization_date"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE orders SET realization_date = :code where order_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["order_id"]);
    oci_bind_by_name($stm, ":code",$_POST['realization_date']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["order_status"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE orders SET status_id = :code where order_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["order_id"]);
    oci_bind_by_name($stm, ":code",$_POST['order_status']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}



header("Location: ../admin_nav/orders_manager.php");

?>
