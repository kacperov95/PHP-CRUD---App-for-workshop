<?php
include_once("../general_libraries/db_connect.php"); 
session_start(); 
?>

<?php include_once("../general_libraries/header.php"); ?>



<?php
if (!isset($_GET['order_id'])) {
    header("Location: ../login_form.php");
    die();
}
$conn = connectOracle();

$stm = oci_parse($conn, "select order_id, status_id
                            from orders
                                where order_id = :id");
oci_bind_by_name($stm, ":id",$_GET['order_id']);

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

        <form action="change_order_status.php" method="post">
        <input type = "hidden" name="order_id" value="<?php echo $row[0]?>">
        <section>
<table>
    <tr>
        
        <th><h2><?php echo "Zmiana statusu zamówienia o ID: {$row[0]}"; ?></h1><br>Status</th>
    </tr>
    <tr>
        
        <th>
        <?php if($row[1] == 1) {
            echo " <input type=\"radio\" id=\"status1\" name=\"order_status\" value=1 checked>
            <label for=\"status1\">Zakończone</label><br>
            <input type=\"radio\" id=\"status2\" name=\"order_status\" value=2>
            <label for=\"status2\">W trakcie</label><br>
            <input type=\"radio\" id=\"status3\" name=\"order_status\" value=3>
            <label for=\"status3\">Nowe</label><br>";
        }
            if($row[1] == 2) {
                echo " <input type=\"radio\" id=\"status1\" name=\"order_status\" value=1>
            <label for=\"status1\">Zakończone</label><br>
            <input type=\"radio\" id=\"status2\" name=\"order_status\" value=2 checked>
            <label for=\"status2\">W trakcie</label><br>
            <input type=\"radio\" id=\"status3\" name=\"order_status\" value=3>
            <label for=\"status3\">Nowe</label><br>";
            }
            if($row[1] == 3) {
                echo " <input type=\"radio\" id=\"status1\" name=\"order_status\" value=1>
                <label for=\"status1\">Zakończone</label><br>
                <input type=\"radio\" id=\"status2\" name=\"order_status\" value=2>
                <label for=\"status2\">W trakcie</label><br>
                <input type=\"radio\" id=\"status3\" name=\"order_status\" value=3 checked>
                <label for=\"status3\">Nowe</label><br>";
            }
        ?>    
    </tr>
</table>

<br><br>
<input type = "submit" value = "Aktualizuj"><br><br>
<section>
<?php 
    if ($_SESSION["user_priviligies"] == 1) {
        echo "<a href=\"../admin_nav/orders_manager.php\" class=backButton>Wróć bez aktualizacji</a>";
    } else {
        echo "<a href=\"../user_nav/orders_manager.php\" class=backButton>Wróć bez aktualizacji</a>";
    }

?>
</body>
</html>