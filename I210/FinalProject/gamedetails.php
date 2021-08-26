<?php
/*
 * Author: James Hicks, Zacharia Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 11/20/2019
 * Description: This PHP script retrieves a game id from a url querystring.
 *  It then retrieves details of the specified details from the games table in the databate.
 *  At the end, it displays game information in a HTML table.
 */
$Page_title = "Game Information";
require_once ('includes/header.php');
require_once ('includes/database.php');

//retrieve id from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: id was not found.";
    require_once ('includes/footer.php');
    exit();
}
//Sanatize id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//Select from games table where the details from the game are displayed
$sql = "SELECT * FROM games, categories WHERE id= $id";
//execute query
$query = $conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    require 'includes/footer.php';
    die("Selection failed: ($errno) $error.");
}

if (!$row = $query->fetch_assoc()) {
    $conn->close();
    require 'includes/footer.php';
    die("Game not found.");
}
?>
<h1 style="color:white; text-align: center;">Game Information</h1>

<table id="gamedetails" class="gamedetails">
    <tr>
        <td class="col1">
            <!--display game image -->
            <img src="<?php echo $row['Image'] ?> "width="350" height="414"/>
        </td>
        <td class="col2">
            <h4>Title:</h4>
            <h4>Developer:</h4>
            <h4>Release Date:</h4>
            <h4>Price:</h4>
            <h4>Description:</h4>

        </td>
        <td class="col3">
            <p><?php echo $row['Title'] ?></p>
            <p><?php echo $row['Developer'] ?></p>
            <p><?php echo $row['Release_date'] ?></p>
            <p>$<?php echo $row['price'] ?></p>
            <p><?php echo $row['description'] ?></p>

        </td>
    </tr>
</table>


<?php 
//if statement to check whether an administrator is logged in. if so, priveliges will be given. if not, the default guest priveleges will be given.
if($role==1){
    echo "<input value='Edit' type='button' onclick=window.location.href='edit_gamedetails.php?id=", $row['id'], "'> &nbsp;&nbsp";
    echo "<input value='Delete' type='button' onclick=window.location.href='deletegame.php?id=", $row['id'], "'> &nbsp;&nbsp";
    echo "<input value='Cancel' type='button' onclick=window.location.href='listgames.php?id=", $row['id'], "'> &nbsp;&nbsp";
    echo "<input value='Add to cart' type='button' onclick=window.location.href='addtocart.php?id=", $row['id'], "'> &nbsp;&nbsp";
} else {
    echo "<input value='Cancel' type='button' onclick=window.location.href='listgames.php?id=", $row['id'], "'> &nbsp;&nbsp";
    echo "<input value='Add to cart' type='button' onclick=window.location.href='addtocart.php?id=", $row['id'], "'> &nbsp;&nbsp";
}


?>
<?php
require_once('includes/footer.php');

