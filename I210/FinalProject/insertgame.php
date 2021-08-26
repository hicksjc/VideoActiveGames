<?php

/*
 * Author: James Hicks, Zach Green, Connor Brant, Theo
 * Date: 12/3/2019
 * File: insertbook.php
 * Description:  When "Add Game" is clicked, form data in addgame.php is posted to insertgame.php using “post” method. insertgame.php script will then
  insert the new data into the games table in the database.
 *
 */

$page_title = "VideoActive Games Add a new game";
require_once 'includes/header.php';
require_once('includes/database.php');

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'Title') ||
        !filter_has_var(INPUT_POST, 'Developer') ||
        !filter_has_var(INPUT_POST, 'Category_id') ||
        !filter_has_var(INPUT_POST, 'Release_date') ||
        !filter_has_var(INPUT_POST, 'price') ||
        !filter_has_var(INPUT_POST, 'Image') ||
        !filter_has_var(INPUT_POST, 'description')) {
    echo "There were problems retrieving game details. New game cannot be added.";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//add your code here
$Title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Title', FILTER_SANITIZE_STRING)));
$Developer = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Developer', FILTER_SANITIZE_STRING)));
$Release_date = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Release_date', FILTER_DEFAULT)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$Category_id = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Category_id', FILTER_DEFAULT)));
$Image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

$sql = "INSERT INTO games VALUES ( NULL,  '$Title', '$description', '$price', '$Release_date', '$Developer', '$Category_id', '$Image')";
$query = @$conn->query($sql);
//determine the id of the newly added game
$id = $conn->insert_id;
// close the connection.
$conn->close();
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: ($errno) $errmsg<br/>\n";
    include ('includes/footer.php');
    exit;
}
//display the confirmation message and a link to display details of the new game
echo "<p style='color: white;'>You have successfully inserted the new game into the database </p>";
echo "<p><a href='gamedetails.php?id=$id' style='color:#40E0D0'>Click here for the game details for the new game you added</a></p>";
require_once 'includes/footer.php';
