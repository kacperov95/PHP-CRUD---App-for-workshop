<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>

<?php
if (isset($_GET["user_id"]))
{
    if ($_GET["user_id"] == $_SESSION["user_id"]) {
        header("Location: self_delete_user_form.php");
        die();
    }
    if ($_SESSION['user_priviligies'] != 1) {
        header("Location: ../general_libraries/destroy.php");
    }
    $conn = connectOracle();
    $stm = oci_parse($conn, "delete from users where user_id = :id");
    oci_bind_by_name($stm, ":id",$_GET["user_id"]);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
    
    header("Location: ../admin_nav/users_manager.php");
    }   
else {
    echo "<section>Błąd!\nAkcja nieudana</section>";
    if ($_SESSION['user_priviligies'] == 1) {
        echo "<a href=\"../admin_nav/users_manager.php\" class=backButton>Wróć bez aktualizacji</a>";
    } else {
        echo "<a href=\"../user_nav/orders_manager.php\" class=backButton>Wróć bez aktualizacji</a>";
    }
}
?>