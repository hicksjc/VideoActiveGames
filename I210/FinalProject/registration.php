<?php

/*
 * Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 12/03/2019
 * File: addgame.php
 * Description: This script displays a registration form for new users to create an account.
 * 
 */
?>


<?php
include('includes/header.php');
?>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>

    <center>

        <h3 style="color: white;">Register Here</h3>

        <div>
            <form action="signing_up.php" method="post">
                <table style="color:white;">

                    <tr>
                        <td style="width: 85px">First Name: </td>
                        <td><input name="firstname" type="text" required></td>
                    </tr>
                    <tr>
                        <td>Last Name: </td>
                        <td><input name="lastname" type="text" required></td>
                    </tr>
                    <tr>
                        <td>User Name: </td>
                        <td><input name="username" type="text" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input name="password" type="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style='padding: 10px 0 0 80px' >
                            <input type="submit" value="Register" />
                            <input type="button" value="Cancel" onclick="window.location.href = 'log_field.php'" />
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>

    <?php
    include ('includes/footer.php');
    