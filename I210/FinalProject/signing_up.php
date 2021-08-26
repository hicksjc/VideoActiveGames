

<?php

// Here check whether I got to this page by clicking the proper signup button.
if (!filter_has_var(INPUT_POST, 'firstname') ||
        !filter_has_var(INPUT_POST, 'lastname') ||
        !filter_has_var(INPUT_POST, 'username') ||
        !filter_has_var(INPUT_POST, 'password')) {
    $error = "The service is currently unavailable. Please try again later.";
    header("Location: error.php?m=$error");
    die();
}

require_once ('includes/database.php');

$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
$username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
$role = 2; // users

$sql = "INSERT INTO users VALUES(NULL, '$firstname', '$lastname', '$username', '$password', '$role')";

$query = @$conn->query($sql);

if (!$query) {

    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Input failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$conn->close();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['login'] = $username;
$_SESSION['name'] = "$firstname $lastname";
$_SESSION['role'] = 2;

$_SESSION['login_status'] = 3;

header("Location:log_field.php");
