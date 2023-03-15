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


<?php
if (isset($_SESSION['user_name'])) {
    $conn = connectOracle();
    $stm = oci_parse($conn, "select contractor_id, contractor_name, contractor_acronym, contractor_nip from contractor order by contractor_id");
    if (oci_execute($stm)) { 

        echo "<table>
        <tr>
          <th>ID kontrahenta</th>
          <th>Nazwa kontrahenta</th>
          <th>Nazwa skrócona kontrahenta</th>
          <th>NIP kontrahenta</th>
          
          <th>Akcja</th>
        </tr>";
        
        
        while (($row = oci_fetch_row($stm)) != false)
        {

            echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>{$row[3]}</td>
                <td><a href=\"../contractors_action/change_contractor_form.php?contractor_id={$row[0]}\" class=menuButton3>Edytuj</a>
                <a href=\"../contractors_action/delete_contractor.php?contractor_id={$row[0]}\" class=menuButton3>Usuń</a></td>
            </tr>";
        }
        echo "<tr><td><a href=\"../contractors_action/add_contractor_form.php\" class=menuButton>Dodaj nowego kontrahenta</a></td></tr>";
        echo "</table>";
        
        
    }
}
else {
    header("Location: ../login_form.php");
}
?>
<a href="../general_libraries/destroy.php" class=logoutButton>Wyloguj</a>
        <a href="../admin_nav/menu.php" class=backButton>Wróć do menu</a>