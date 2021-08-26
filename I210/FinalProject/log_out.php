<?php

/* Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 11/20/2019
 * Description: kiils the session and logs a user out.
 */
?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION = array();

setcookie(session_name(), " ", time() - 3600);

session_destroy();

include('includes/header.php');
?>

<h2 style='color:white'>Logout</h2>

<p style='color:white;'> You are now logged out.</p>

<?php
include('includes/footer.php');
