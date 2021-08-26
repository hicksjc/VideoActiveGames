<?php
/*
 * Author: James Hicks, Zach Green
 * Date: 12/3/2019
 * Name: searchgameresults.php
 * Description: This script searchs for Games that match game titles in the database.
 */
$Page_title = "Search Game results";

require_once ('includes/header.php');
require_once('includes/database.php');

if (filter_has_var(INPUT_GET, "terms")) {
    $terms_str = filter_input(INPUT_GET, 'terms', FILTER_SANITIZE_STRING);
} else {
    echo "There was not search terms found.";
    include ('includes/footer.php');
    exit;
}

//explode the search terms into an array
$terms = explode(" ", $terms_str);

//select statement using pattern search. Multiple terms are concatnated in the loop.
$sql = "SELECT * FROM games WHERE 1";
foreach ($terms as $term) {
    $sql .= " AND Title LIKE '%$term%'";
}
//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg.";
    $conn->close();
    include ('includes/footer.php');
    exit;
}

echo "<h2 style='color:white'>Displaying Results For: $terms_str</h2>";

//display results in a table
if ($query->num_rows == 0) {
    echo "<p style='color: red;'>Your search <i>'$terms_str'</i> did not match any Games in our store.</p>";
} else {
    ?>

    <table style="color:white;" >
 
        <?php
        //insert a row into the table for each row of data
        while (($row = $query->fetch_assoc()) !== NULL) {
            echo "<tr style='color:white'>";
            echo "<td><a href='gamedetails.php?id=", $row['id'], "'>", "<img id='image' src=", $row['Image'], " width='250' height='400'/></a></td>";
            echo "<td>", $row['Title'], "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
}
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

include ('includes/footer.php');
