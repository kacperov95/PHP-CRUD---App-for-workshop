<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>

<?php
if ($_POST["dec"] == 'TAK')
{
    $conn = connectOracle();
    $stm = oci_parse($conn, "delete from users where user_id = :id");
    oci_bind_by_name($stm, ":id",$_SESSION["user_id"]);
    oci_execute($stm);
    oci_free_statement($stm);
    oci_close($conn);
    
    header("Location: ../login_form.php");
    }   
else {
    echo "<section>Usuwanie przerwane\n";
    ?> <br><br><br> <?php
    if ($_SESSION['user_priviligies'] == 1) {
        echo "\n<a href=\"../admin_nav/users_manager.php\" class=backButton>Wróć do menu</a></section>";
    } else {
        echo "\n<a href=\"../user_nav/users_manager.php\" class=backButton>Wróć do menu</a></section>";
    }
}
?>