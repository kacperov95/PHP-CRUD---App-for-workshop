<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>


<?php


if ($_POST["order_status"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE orders SET status_id = :code where order_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["order_id"]);
    oci_bind_by_name($stm, ":code",$_POST['order_status']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}



if ($_SESSION['user_priviligies'] == 1) {
    header("Location: ../admin_nav/orders_manager.php");
} else {
    header("Location: ../user_nav/orders_manager.php");
}

?>