<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>


<?php


if ((isset($_POST["user_name"])) && (isset($_POST["user_surname"])) && (isset($_POST["user_login"])) && (isset($_POST["user_password"])) && (isset($_POST["user_priviligies"]))){

    $conn = connectOracle();
    $stm = oci_parse($conn, "insert into users values (NULL, :name, :surname, :login, (dbms_crypto.hash(utl_raw.cast_to_raw(:password),3)), :priviligies)");
    oci_bind_by_name($stm, ":name",$_POST["user_name"]);
    oci_bind_by_name($stm, ":surname",$_POST["user_surname"]);
    oci_bind_by_name($stm, ":login",$_POST["user_login"]);
    oci_bind_by_name($stm, ":password",$_POST["user_password"]);
    oci_bind_by_name($stm, ":priviligies",$_POST["user_priviligies"]);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}
header("Location: ../admin_nav/users_manager.php");

?>