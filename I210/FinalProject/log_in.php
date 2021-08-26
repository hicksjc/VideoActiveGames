<?php

/* Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 *  Date: 11/20/2019
 *  Description: Checks to make sure that username and password is the same as what is in the database.
 *  If it is the same, a login status will be set. 
 */
?>


<?php

require_once('includes/database.php');

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//create variable login status.
$_SESSION['login_status'] = 2;
$username = $password = "";

//retrieve user name and password from the form in the login form
if (filter_has_var(INPUT_POST, 'username') || filter_has_var(INPUT_POST, 'password')) {
    $username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
    $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
}

//validate user name and password against a record in the users table in the database. If they are valid, create session variables.
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$query = @$conn->query($sql);

if ($query->num_rows) {

    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
    $_SESSION['login_status'] = 1;
} else {
//    this means the user entered a wrong username or password, thus giving an error message and asking them to try again.
    $_SESSION['login_status'] = 4; 
}



//close the connection
$conn->close();

//redirect to the loginform.php page
header("Location: log_field.php");
