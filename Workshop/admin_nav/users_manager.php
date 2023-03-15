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
    $stm = oci_parse($conn, "select u.user_id, u.user_name, u.user_surname, u.user_login, p.priviligies_name from users u, user_priviligies p where u.user_priviligies = p.priviligies_id order by u.user_id");
    if (oci_execute($stm)) { 

        echo "<table>
        <tr>
          <th>ID użytkownika</th>
          <th>Imię i nazwisko użytkownika</th>
          <th>Login</th>
          <th>Poziom uprawnień</th>
          <th>Akcja</th>
        </tr>";
        
        
        while (($row = oci_fetch_row($stm)) != false)
        {

            echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]} {$row[2]}</td>
                <td>{$row[3]}</td>
                <td>";

                if ($row[4] == 'user') {
                    echo "Użytkownik";
                } else {
                    echo "Administrator";
                }
                echo "</td>

                <td><a href=\"../users_action/change_user_form.php?user_id={$row[0]}\" class=menuButton3>Edytuj</a>
                <a href=\"../users_action/delete_user.php?user_id={$row[0]}\" class=menuButton3>Usuń</a></td>
            </tr>";
        }
        echo "<tr><td><a href=\"../users_action/add_user_form.php\" class=menuButton>Dodaj nowego użytkownika</a></td></tr>";
        echo "</table>";
        
         
    }
}
else {
    header("Location: ../login_form.php");
}
?>
<a href="../general_libraries/destroy.php" class=logoutButton>Wyloguj</a>
        <a href="../admin_nav/menu.php" class=backButton>Wróć do menu</a>