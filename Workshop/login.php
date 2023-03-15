<?php
include_once("general_libraries/db_connect.php");

session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
    header("Location: login_form.php");
}


$login = $_POST['login'];
$haslo = $_POST['haslo'];
$conn = connectOracle();
header("Content-type: text/plain");

$stm = oci_parse($conn, "select user_id, user_name, user_priviligies from users where
user_login = :login and
user_password = dbms_crypto.hash(utl_raw.cast_to_raw(:haslo),3)");
oci_bind_by_name($stm, ":login",$login);
oci_bind_by_name($stm, ":haslo",$haslo);
$isLogin = false;

if (oci_execute($stm)) {
    oci_fetch_all($stm, $ar);
    
    if (count($ar['USER_ID']) == 1) {
        $_SESSION['user_id'] = $ar['USER_ID'][0];
        $_SESSION['user_name'] = $ar['USER_NAME'][0];
        $_SESSION['user_priviligies'] = $ar['USER_PRIVILIGIES'][0];
        $isLogin = true;
    }
}


oci_free_statement($stm);
oci_close($conn);

if($isLogin == false)
{
    $_SESSION['error'] = "Błędny login lub hasło";
    header("Location: login_form.php");
    
} else
{   
    if ($_SESSION['user_priviligies'] == 1)
    {
         header("Location: admin_nav/menu.php");

    }
    else {
        echo $_SESSION['user_priviligies'];

         header("Location: user_nav/menu.php");
    }
}
?>
