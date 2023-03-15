<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>


<?php
if (isset($_SESSION['user_name'])) {
    $conn = connectOracle();
    $stm = oci_parse($conn, "select u.user_id, u.user_name, u.user_surname, u.user_login, p.priviligies_name 
    from users u, user_priviligies p 
    where u.user_priviligies = p.priviligies_id and u.user_id = :id");
    oci_bind_by_name($stm, ':id', $_SESSION['user_id']);
    if (oci_execute($stm)) { 

        echo "<table>
        <tr>
          <th>ID użytkownika</th>
          <th>Imię i nazwisko użytkownika</th>
          <th>Login</th>
          <th>Poziom uprawnień</th>
          <th>Akcja</th>
        </tr>";
        
        
        $row = oci_fetch_row($stm);
        

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

                <td><a href=\"../users_action/change_user_form.php?user_id={$_SESSION["user_id"]}\" class=menuButton3>Edytuj</a></td>
            </tr>";
        

        echo "</table>";
        
         
    }
}
else {
    header("Location: ../login_form.php");
}
?>
<a href="../general_libraries/destroy.php" class=logoutButton>Wyloguj</a>
        <a href="../user_nav/menu.php" class=backButton>Wróć do menu</a>