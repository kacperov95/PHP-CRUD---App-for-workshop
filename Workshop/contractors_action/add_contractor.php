<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>


<?php


if ((isset($_POST["contractor_nip"])) && (isset($_POST["contractor_acronym"])) && (isset($_POST["contractor_name"]))){

    $conn = connectOracle();
    $stm = oci_parse($conn, "insert into contractor values (NULL, :name, :acronym, :nip)");
    oci_bind_by_name($stm, ":nip",$_POST["contractor_nip"]);
    oci_bind_by_name($stm, ":name",$_POST["contractor_name"]);
    oci_bind_by_name($stm, ":acronym",$_POST["contractor_acronym"]);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}
header("Location: ../admin_nav/contractors_manager.php");

?>