<?php
 
/** Author: James Hicks, Zachariah Green
 *  Date: 10/30/2015
 *  Description: This PHP script retrieves game id from a query string variable.
 *  It then deletes a record from the games table in the database.
 */
 
$page_title = "Delete a Game";
 
require_once ('includes/header.php');
require_once('includes/database.php');
 
//retrieve user id from a querystring
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: game id was not found.";
    require_once ('includes/footer.php');
    exit();
}
 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 
//define the MySQL delete statement
 $sql="DELETE FROM games WHERE id=$id";
 
//execute the query
 $query=@$conn->query($sql);
 
//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//confirm delete
echo "<p style='color: white;'>The Game has been deleted.</p>";
// close the connection.
$conn->close();
 
include ('includes/footer.php');
