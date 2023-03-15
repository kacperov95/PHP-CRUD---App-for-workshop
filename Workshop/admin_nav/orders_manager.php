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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black">
<button class="w3-bar-item w3-button" onclick="openCity('all_by_realization_date')">Wszystkie zamówienia</button>
  <button class="w3-bar-item w3-button" onclick="openCity('current_by_realization_date')">Aktualne zamówienia</button>
  
  <button class="w3-bar-item w3-button" onclick="openCity('current_by_product_name')">Zamówione produkty łącznie</button>
  <button class="w3-bar-item w3-button" onclick="openCity('count_order_by_contractor')">Ilość zamówień danych kontrahentów</button>
  <button class="w3-bar-item w3-button" onclick="openCity('realized_by_realization_date')">Zrealizowane zamówienia - od najstarszych</button>
</div>



<div id='current_by_realization_date' class="w3-container city" style="display:none">
<?php
if (isset($_SESSION['user_name'])) {
    $conn = connectOracle();

    $stm = oci_parse($conn, "select orders.order_id, contractor.contractor_acronym, orders.contractor_order_id, product_card.product_name, orders.quantity, orders.order_date, orders.realization_date, order_status.status_name
    from orders, contractor, product_card, order_status
    where orders.contractor_id = contractor.contractor_id and orders.product_id = product_card.product_id and orders.status_id = order_status.status_id and order_status.status_name != 'Zakończony'
    order by orders.realization_date");
    // oci_bind_by_name($stm, ":id",$_SESSION['id']);

    if (oci_execute($stm)) { 

        echo "<table>
        <tr>
          <th>ID zamówienia</th>
          <th>Kontrahent</th>
          <th>Numer zamówienia kontrahenta</th>
          <th>Nazwa produktu</th>
          <th>Wielkość zamówienia (szt.)</th>
          <th>Data zamówienia (RR/MM/DD)</th>
          <th>Data realizacji (RR/MM/DD)</th>
          <th>Status zamówienia</th>
          <th>Akcja</th>
        </tr>";
        
        
        while (($row = oci_fetch_row($stm)) != false)
        {
            echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>{$row[3]}</td>
                <td>{$row[4]}</td>
                <td>{$row[5]}</td>
                <td>{$row[6]}</td>
                <td>{$row[7]}</td>
                <td width = 500px><a href=\"../orders_action/change_order_form.php?order_id={$row[0]}\" class=menuButton2>Edytuj</a>
                <a href=\"../orders_action/change_order_status_form.php?order_id={$row[0]}\" class=menuButton2>Zmień status</a>
                <a href=\"../orders_action/delete_order.php?order_id={$row[0]}\" class=menuButton2>Usuń</a></td>
            </tr>";
        }
        echo "<tr><td><a href=\"../orders_action/add_order_form.php\" class=menuButton3>Dodaj zamówienie</a></td></tr>";
        echo "</table>";

        
    }


    oci_free_statement($stm);
    oci_close($conn);

}
else {
    header("Location: ../login_form.php");
}

?>
</div>

<div id='all_by_realization_date' class="w3-container city">
<?php
if (isset($_SESSION['user_name'])) {
    $conn = connectOracle();

    $stm = oci_parse($conn, "select orders.order_id, contractor.contractor_acronym, orders.contractor_order_id, product_card.product_name, orders.quantity, orders.order_date, orders.realization_date, order_status.status_name
    from orders, contractor, product_card, order_status
    where orders.contractor_id = contractor.contractor_id and orders.product_id = product_card.product_id and orders.status_id = order_status.status_id 
    order by orders.realization_date");
    // oci_bind_by_name($stm, ":id",$_SESSION['id']);

    if (oci_execute($stm)) { 

        echo "<table>
        <tr>
          <th>ID zamówienia</th>
          <th>Kontrahent</th>
          <th>Numer zamówienia kontrahenta</th>
          <th>Nazwa produktu</th>
          <th>Wielkość zamówienia (szt.)</th>
          <th>Data zamówienia (RR/MM/DD)</th>
          <th>Data realizacji (RR/MM/DD)</th>
          <th>Status zamówienia</th>
          <th>Akcja</th>
        </tr>";
        
        
        while (($row = oci_fetch_row($stm)) != false)
        {
            echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>{$row[3]}</td>
                <td>{$row[4]}</td>
                <td>{$row[5]}</td>
                <td>{$row[6]}</td>
                <td>{$row[7]}</td>



                <td width = 500px><a href=\"../orders_action/change_order_form.php?order_id={$row[0]}\" class=menuButton2>Edytuj</a>
                <a href=\"../orders_action/change_order_status_form.php?order_id={$row[0]}\" class=menuButton2>Zmień status</a>
                <a href=\"../orders_action/delete_order.php?order_id={$row[0]}\" class=menuButton2>Usuń</a></td>
            </tr>";
        }
        echo "<tr><td><a href=\"../orders_action/add_order_form.php\" class=menuButton3>Dodaj zamówienie</a></td></tr>";
        echo "</table>";

        
    }


    oci_free_statement($stm);
    oci_close($conn);

}
else {
    header("Location: ../login_form.php");
}

?>
</div>

<div id='current_by_product_name' class="w3-container city" style="display:none">
<?php
if (isset($_SESSION['user_name'])) {
    $conn = connectOracle();

    $stm = oci_parse($conn, "select prod.product_name, sum(quantity) 
    from product_card prod, orders o, order_status status 
    where prod.product_id = o.product_id and o.status_id = status.status_id and status.status_name != 'Zakończony' 
    group by prod.product_name");
    // oci_bind_by_name($stm, ":id",$_SESSION['id']);

    if (oci_execute($stm)) { 

        echo "<table>
        <tr>
          <th>Nazwa produktu</th>
          <th>Wielkość zamówienia (szt.)</th>
        </tr>";
        
        
        while (($row = oci_fetch_row($stm)) != false)
        {
            echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
            </tr>";
        }
        echo "</table>";

        
    }


    oci_free_statement($stm);
    oci_close($conn);

}
else {
    header("Location: ../login_form.php");
}

?>
</div>

<div id='count_order_by_contractor' class="w3-container city" style="display:none">
<?php
if (isset($_SESSION['user_name'])) {
    $conn = connectOracle();

    $stm = oci_parse($conn, "select  c.contractor_acronym, count(o.order_id)
    from contractor c, orders o
    where o.contractor_id = c.contractor_id
            group by c.contractor_acronym");

    if (oci_execute($stm)) { 

        echo "<table>
        <tr>
          <th>Kontrahent</th>
          <th>Liczba zamówień</th>
        </tr>";
        
        
        while (($row = oci_fetch_row($stm)) != false)
        {
            echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
            </tr>";
        }
        echo "</table>";

        
    }


    oci_free_statement($stm);
    oci_close($conn);

}
else {
    header("Location: ../login_form.php");
}

?>
</div>

<div id='realized_by_realization_date' class="w3-container city" style="display:none">
<?php
if (isset($_SESSION['user_name'])) {
    $conn = connectOracle();

    $stm = oci_parse($conn, "select orders.order_id, contractor.contractor_acronym, orders.contractor_order_id, product_card.product_name, orders.quantity, orders.order_date, orders.realization_date, order_status.status_name
    from orders, contractor, product_card, order_status
    where orders.contractor_id = contractor.contractor_id and orders.product_id = product_card.product_id and orders.status_id = order_status.status_id and order_status.status_name = 'Zakończony'
    order by orders.realization_date DESC");

    if (oci_execute($stm)) { 

        echo "<table>
        <tr>
          <th>ID zamówienia</th>
          <th>Kontrahent</th>
          <th>Numer zamówienia kontrahenta</th>
          <th>Nazwa produktu</th>
          <th>Wielkość zamówienia (szt.)</th>
          <th>Data zamówienia (RR/MM/DD)</th>
          <th>Data realizacji (RR/MM/DD)</th>
          <th>Status zamówienia</th>
        </tr>";
        
        
        while (($row = oci_fetch_row($stm)) != false)
        {
            echo "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>{$row[3]}</td>
                <td>{$row[4]}</td>
                <td>{$row[5]}</td>
                <td>{$row[6]}</td>



                <td width = 500px>
                <a href=\"../orders_action/change_order_form.php?order_id={$row[0]}\" class=menuButton2>Edytuj</a>
                <a href=\"../orders_action/delete_order.php?order_id={$row[0]}\" class=menuButton2>Usuń</a>
                </td>
            </tr>";
        }
        echo "<tr><td><a href=\"../orders_action/add_order_form.php\" class=menuButton3>Dodaj zamówienie</a></td></tr>";
        echo "</table>";

        
    }


    oci_free_statement($stm);
    oci_close($conn);

}
else {
    header("Location: ../login_form.php");
}

?>
</div>

<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(cityName).style.display = "block";
}
</script>

<a href="../general_libraries/destroy.php" class=logoutButton>Wyloguj</a>
<a href="../admin_nav/menu.php" class=backButton>Wróć do menu</a>


