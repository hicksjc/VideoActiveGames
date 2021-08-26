<?php
/*
 * Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 11/20/2019
 * Description: This PHP script retrieves a game id from a url querystring.
 *  It then retrieves details of the specified details from the games table in the databate.
 *  At the end, it displays game information in a HTML table.
 */

$Page_title = "Game Information";
require_once 'includes/header.php';
require_once 'includes/database.php';

//retrieve id from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: id was not found.";
    require_once 'includes/footer.php';
    exit();
}
//Sanatize id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//Select from games table where the details from the games are displayed
$sql = "SELECT * FROM games WHERE id=$id";
//execute query
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: $errno, $errmsg<br/>\n";
    $conn->close();
    include 'includes/footer.php';
    exit;
}

if (!$row = $query->fetch_assoc()) {
    $conn->close();
    require 'includes/footer.php';
    die("Game not found.");
}
?>
<h2 style="color:white; text-align: center;">Game Information</h2>
<form name="edit_gamedetails" action="updategames.php" method="get">
    <table id="gamedetails" class="gamedetails">
        <tr>
            <th>Game id</th>
            <td><input name="id" value="<?php echo $row['id']; ?>" size="30" required/></td>
        </tr>
        <tr>
            <th>Title</th>
            <td><input name="Title" value="<?php echo $row['Title']; ?>" size="30" required/></td>
        </tr>
        <tr>
            <th>Developer</th>
            <td><input name="Developer" value="<?php echo $row['Developer']; ?>" size="30" required/></td>
        </tr>
        <tr>
            <th>Release date</th>
            <td><input name="Release_date" value="<?php echo $row['Release_date']; ?>" size="30" required/></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><input name="description" value="<?php echo $row['description']; ?>" size="30" required/></td>
        </tr>
        <tr>
            <th>price</th>
            <td><input name="price" value="<?php echo $row['price']; ?>" size="30" required/></td>
        </tr>
    </table>
    
    <input type="submit" value="Update"> &nbsp;&nbsp;
    <input type="button" onclick="window.location.href = 'gamedetails.php?id=<?php echo $row['id']; ?>'" value="Cancel">
    
</form>


<?php
require_once('includes/footer.php');