<?php

/* Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 11/20/2019
 * Description: Displays a login field where registered users or administrators can login into their account. 
 * It outputs an appropriate message depending on what login status the account is set to. 
 * Error message is given when wrong password or username is inputed into the login fields.
 */
?>


<?php
include('includes/header.php');
include('includes/database.php');

$login_status = '';
if (isset($_SESSION['login_status'])) {
    $login_status = $_SESSION['login_status'];
}
if ($login_status == 1) {
    echo"<p style='color:white;'>You are logged in as " . $_SESSION['login'] . ".</p>";
    include('includes/footer.php');
    exit();
}
if ($login_status == 3) {
    echo"<p style='color:white;'>Thank you for registering with us. Your account has been created.</p>";
    include('includes/footer.php');
    exit();
}
if ($login_status == 4) {
    echo"<p style='color:red;'>You have entered a wrong username or password. Please try again.</p>";

}
?>



<html>
    <head>
        <title>Login</title>
       
    </head>

    <body>
    <center>

        <h3 style="color: white;">Login Here</h3>
        <form action="log_in.php" method="post">
            <table style="color: white;">
                <tbody>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" placeholder="Enter username" required></td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" placeholder="Enter password" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Login"></td>
                        <td>Not yet a Member? <a href="registration.php">Register</a></td>
                    </tr>

                </tbody>
            </table>


        </form>


        <?php
        include ('includes/footer.php');

        