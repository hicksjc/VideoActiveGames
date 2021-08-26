<?php
/*
 * Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 12/03/2019
 * File: addgame.php
 * Description: This script allows administrators to edit and update a game.
 * 
 */
$page_title = "Update game details";
 
require_once ('includes/header.php');
require_once('includes/database.php');
 
//retrieve, sanitize, and escape all fields from the form
$id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$Title = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'Title', FILTER_SANITIZE_STRING)));
$Developer = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'Developer', FILTER_SANITIZE_STRING)));
$Release_date = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'Release_date', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'price', FILTER_DEFAULT)));
//Define MySQL update statement 
$sql = "UPDATE games SET Title='$Title', description='$description', price='$price', Release_date='$Release_date', Developer='$Developer' WHERE id=$id"; 
//Execute the query.
$query = @$conn->query($sql); 
 
//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include ('includes/footer.php');
    exit;
}
echo "<p style='color: white;'>Your game has been updated.</p>";
 
// close the connection.
$conn->close();
 
include ('includes/footer.php');
