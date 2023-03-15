<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>


<?php


if ($_POST["product_code"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE product_card SET product_code = :code where product_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["product_id"]);
    oci_bind_by_name($stm, ":code",$_POST['product_code']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["product_name"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE product_card SET product_name = :name where product_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["product_id"]);
    oci_bind_by_name($stm, ":name",$_POST['product_name']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["product_pressed"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE product_card SET product_pressed = :pressed where product_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["product_id"]);
    oci_bind_by_name($stm, ":pressed",$_POST['product_pressed']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["product_finish"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE product_card SET product_finish = :finish where product_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["product_id"]);
    oci_bind_by_name($stm, ":finish",$_POST['product_finish']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["product_weight"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE product_card SET product_weight_kg = :weight where product_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["product_id"]);
    oci_bind_by_name($stm, ":weight",$_POST['product_weight']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

header("Location: ../admin_nav/products_manager.php");

?>
