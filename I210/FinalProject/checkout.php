<?php
/*
 * Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 12/03/2019
 * File: addgame.php
 * Description: This script is for updating the shopping cart, clearing everything from shopping cart when the checkout button is clicked and outputs a thank you message.
 * 
 */
?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header("Location:log_field.php");
    exit();
}

$_SESSION['cart'] = NULL;
$count = 0;
require_once('includes/header.php');
?>

<h2 style='color:white;'>Checkout</h2>

<p style='color:white;'>Thank you for choosing VideoActive Games. Your business is greatly appreciated. You will be notified once your items are shipped.</p>

<?php
include('includes/footer.php');
