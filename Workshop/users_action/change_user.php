<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>


<?php

if ($_POST["user_name"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE users SET user_name = :name where user_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["user_id"]);
    oci_bind_by_name($stm, ":name",$_POST['user_name']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["user_surname"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE users SET user_surname = :surname where user_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["user_id"]);
    oci_bind_by_name($stm, ":surname",$_POST['user_surname']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["user_login"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE users SET user_login = :login where user_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["user_id"]);
    oci_bind_by_name($stm, ":login",$_POST['user_login']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["user_password"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE users SET user_password = (dbms_crypto.hash(utl_raw.cast_to_raw(:password),3)) where user_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["user_id"]);
    oci_bind_by_name($stm, ":password",$_POST['user_password']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["user_priviligies"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE users SET user_priviligies = :priviligies where user_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["user_id"]);
    oci_bind_by_name($stm, ":priviligies",$_POST['user_priviligies']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_SESSION['user_priviligies'] == 1) {
    header("Location: ../admin_nav/users_manager.php");
} else {
    header("Location: ../user_nav/users_manager.php");
}

?>
