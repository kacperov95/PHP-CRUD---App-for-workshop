<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
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
        </tr>";
        
        
        while (($row = oci_fetch_row($stm)) != false)
        {

            echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>{$row[3]}</td>
            </tr>";
        }

        echo "</table>";
        
        
    }
}
else {
    header("Location: ../login_form.php");
}
?>
<a href="../general_libraries/destroy.php" class=logoutButton>Wyloguj</a>
        <a href="../user_nav/menu.php" class=backButton>Wróć do menu</a>