<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php 
if ($_SESSION['user_priviligies'] != 1) {
    header("Location: ../general_libraries/destroy.php");
}
?>

<?php include_once("../general_libraries/header.php"); ?>

<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 350px;
}

td, th {
  border: 0px;
  text-align: center;
  pdding: 8px;
}


</style>
<section>
<table>
        <tr>
          <th><h1>Witaj <?php echo $_SESSION['user_name'] ?></h1>
          <h1>Menu</h1></th>
        </tr>
        <tr>
            <th><a href="orders_manager.php" class=menuButton>Zarządzanie zamówieniami</a></th>
        </tr>
        <tr>
            <th><a href="contractors_manager.php" class=menuButton>Zarządzanie klientami</a></th>
        </tr>
        <tr>
            <th><a href="products_manager.php" class=menuButton>Zarządzaj produktami</a></th>
        </tr>
        <tr>
            <th><a href="users_manager.php" class=menuButton>Zarządzaj użytkownikami</a></th>
        </tr>
        <tr>
            <th><a href="../general_libraries/destroy.php" class=logoutButton>Wyloguj</a></th>
        </tr>
</table>
</section>

</body>
