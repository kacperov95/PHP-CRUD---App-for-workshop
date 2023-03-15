<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>



<?php
if (!isset($_GET['contractor_id'])) {
    header("Location: ../login_form.php");
    die();
}
$conn = connectOracle();

$stm = oci_parse($conn, "select contractor_id, contractor_name, contractor_acronym, contractor_nip from contractor where contractor_id = :id");
oci_bind_by_name($stm, ":id",$_GET['contractor_id']);

if (oci_execute($stm)) { 
    $row = oci_fetch_row($stm);
}

oci_free_statement($stm);
oci_close($conn);
?>
<style>
    input[type=submit] {
    background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 22px;
  text-decoration: none;
  margin-left: 46%;
  margin-top: 20px;
  cursor: pointer;

}

input[type=text] {
    text-align: center;
}

table {
  background: #4d5757;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td {
  border: 0px solid #3D3D3B;
  text-align: center;
  padding: 8px;
}

h1 {color: white;}
</style>

<h1>Wprowadź nowe dane tylko w pola, które chcesz zmienić. 
        <br>Jeśli wprowadzisz nieprawidłowe dane, nie zostaną one wprowadzone.</h1>
        <form action="change_contractor.php" method="post">
        <input type = "hidden" name="contractor_id" value="<?php echo $row[0]?>">
<table>
    <tr>
        <th>Nazwa</th>
        <th>Nazwa skrócona</th>
        <th>NIP</th>
    </tr>
    <tr>
        <th><input type = "text" name="contractor_name" value="<?php echo $row[1]?>"></th>
        <th><input type = "text" name="contractor_acronym" value="<?php echo $row[2]?> "></th>
        <th><input type = "text" name="contractor_nip" value="<?php echo $row[3]?>"></th>

    </tr>
</table>

<input type = "submit" value = "Aktualizuj">

<br><br><a href="../admin_nav/contractors_manager.php" class=backButton>Wróć bez aktualizacji</a>
</body>
</html>