<?php

/** Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 *  Date: 11/20/2019
 *  Description: Header is set so that we can call it in our other scripts.
 */
?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$count = 0;

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    if ($cart) {
        $count = array_sum($cart);
    }
}

//variables for a user's login, name, and role
$login = '';
$name = '';
$role = 0;



//if the user has logged in, retrieve login, name, and role.
if (isset($_SESSION['login']) AND isset($_SESSION['name']) AND isset($_SESSION['role'])) {
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="www/css/style.css"/>
        <title><?php echo $Page_title; ?></title>
    </head>

    <body>

        <div id="wrapper">


            <div id="curdate" style="text-align: right">

                <?php
                date_default_timezone_set('America/New_York');
                echo date("l, F d, Y", time());
                ?>
            </div>
            <?php
            if ($role == 1){
             echo "<div class='topnav'>";
             echo "<img style='text-align:left;' src='../FinalProject/www/images/websitelogo.JPG'>";
             echo "<a class='active' href='homepage.php'>Home</a>";
             echo "<a href='listgames.php'>Library</a>";
             echo   "<a href='showcart.php'>Shopping Cart</a>";
            } else if ($role !== 1){
             echo "<div class='topnav2'>";
             echo "<img style='text-align:left;' src='../FinalProject/www/images/websitelogo.JPG'>";
             echo "<a class='active' href='homepage.php'>Home</a>";
             echo "<a href='listgames.php'>Library</a>";
             echo   "<a href='showcart.php'>Shopping Cart</a>";
            }
             ?>
                <?php
                if ($role == 1) {
                    echo "<a href = 'addgame.php'>Add Game</a>";
                }
                if (empty($login)) {
                    echo "<a href='log_field.php'>Login</a>";
                } else if ($role == 1) {
                    echo "<a href='log_out.php'>Logout</a>";
                    echo "<span style='color: magenta; margin-left:30px;'> Welcome $name!</span>";
                } else if ($role !== 1) {
                    echo "<a href='log_out.php'>Logout</a>";
                    echo "<span style='color: turquoise; margin-left:30px;'> Welcome $name!</span>";
                }
                ?>
                <form action="searchgameresults.php" method="get">
                    <br><input type="text" name="terms" size="40" placeholder="Search Game..."required />
                    <br><input style='float: right;' type="submit" name="Submit" id="Submit" value="Search" />
                </form>
               
            </div>
            <!--main body starts -->
            <div id="mainbody">
