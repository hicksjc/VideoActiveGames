<?php

/*
 * Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 12/03/2019
 * File: addgame.php
 * Description: This script displays games inside the shopping cart and gives the price of each game, as well as the total grand price of your selected games.
 * 
 */
?>
<?php
require_once ('includes/header.php');
require_once('includes/database.php');
?>
<h2 style='color:white;'>My Shopping Cart</h2>
<?php
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "<p style='color:white;'>Your shopping cart is empty.<br><br></p>";
    include ('includes/footer.php');
    exit();
}

$cart = $_SESSION['cart'];
?>
<table>
    <tr id="cart" style='color: white;'>
        <th style="width: 500px">Title</th>
        <th style="width: 60px">Price</th>
        <th style="width: 60px">Quantity</th>
        <th style="width: 60px">Total</th>
        <th style="width: 60px">Grand Total</th>
    </tr>
    <?php
    $sql = "SELECT id, Title, price FROM games WHERE 0";

    foreach (array_keys($cart) as $id) {
        $sql .= " OR id=$id";
    }
    
    $query = $conn->query($sql);

    $final_total = 0;

    while ($row = $query->fetch_assoc()) {
        $id = $row['id'];
        $Title = $row['Title'];
        $price = $row['price'];
        $qty = $cart[$id];
        $total = $qty * $price;
        $final_total += $total;
        echo "<tr style='color:white;'>",
        "<td><a href='gamedetails.php?id=$id'>$Title</a></td>",
        "<td style='text-align:center;' width='300'>$$price</td>",
        "<td style='text-align:center;' width='300'>$qty</td>",
        "<td style='text-align:center;' width='300'>$$total</td>",
        "</tr>";
    }

    echo "<tr style='color:white'>",
    "<td></td>",
    "<td></td>",
    "<td></td>",
    "<td></td>",
    "<td style='color:white;'>$$final_total</td>",
    "</tr>";
    ?>
</table>
<br>
<div>
    <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    <input type="button" value="Back" onclick="window.location.href = 'listgames.php'" />
</div>
<br><br>

<?php
include ('includes/footer.php');
