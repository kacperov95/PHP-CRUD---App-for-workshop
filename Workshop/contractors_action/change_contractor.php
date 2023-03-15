<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>


<?php


if ($_POST["contractor_name"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE contractor SET contractor_name = :name where contractor_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["contractor_id"]);
    oci_bind_by_name($stm, ":name",$_POST['contractor_name']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["contractor_acronym"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE contractor SET contractor_acronym = :acronym where contractor_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["contractor_id"]);
    oci_bind_by_name($stm, ":acronym",$_POST['contractor_acronym']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

if ($_POST["contractor_nip"] != "") {
    $conn = connectOracle();
    $stm = oci_parse($conn, "UPDATE contractor SET contractor_nip = :nip where contractor_id= :id");
    oci_bind_by_name($stm, ":id",$_POST["contractor_id"]);
    oci_bind_by_name($stm, ":nip",$_POST['contractor_nip']);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
}

header("Location: ../admin_nav/contractors_manager.php");

?>
