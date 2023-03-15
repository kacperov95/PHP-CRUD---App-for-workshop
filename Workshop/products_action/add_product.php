<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>


<?php


if (
(isset($_POST["product_id"])) &&
(isset($_POST["product_code"])) && 
(isset($_POST["product_name"])) && 
(isset($_POST["product_pressed"])) &&
(isset($_POST["product_finish"])) &&
(isset($_POST["product_weight"]))
){

    $conn = connectOracle();
    $stm = oci_parse($conn, "insert into product_card values (NULL, :code, :name, :Press, :finish, :weight)");
    oci_bind_by_name($stm, ":code",$_POST["product_code"]);
    oci_bind_by_name($stm, ":name",$_POST["product_name"]);
    oci_bind_by_name($stm, ":press",$_POST["product_pressed"]);
    oci_bind_by_name($stm, ":finish",$_POST["product_finish"]);
    oci_bind_by_name($stm, ":weight",$_POST["product_weight"]);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}
header("Location: ../admin_nav/products_manager.php");

?>