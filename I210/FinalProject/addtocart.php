<?php
/*
 * Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 12/03/2019
 * File: addgame.php
 * Description: This script displays a form to accept a new games details.
 * 
 */
?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}

//if game id cannot be found, terminate script
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "Game id not found. Operation cannot procees. <br><br>";
    header("Location: error.php?m=$error");
    die();
}
//retrieve game id and make sure it is a numeric value 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!is_numeric($id)) {
    $error = "Invalid game id, Operation cannot proceed.<br><br>";
    header("Location: error.php?m=$error");
    die();
}
if(array_key_exists($id,$cart)) {
    $cart[$id] = $cart[$id] + 1;
} else {
    $cart[$id] = 1;
}
//update the session variable 
$_SESSION['cart'] = $cart;
//readirect to the showcart.php page
header('Location: showcart.php');
