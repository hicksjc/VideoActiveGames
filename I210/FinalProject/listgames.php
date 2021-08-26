
<?php

/** Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 *  Date: 11/20/2019
 *  Description: Shows the list of video games available. 
 */
$Page_title = "Games in our store";
require 'includes/header.php';
require_once 'includes/database.php';

$sql = "SELECT * FROM games";

$query = $conn->query($sql);

if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg</br>\n";
    $conn->close();
    require_once 'includes/footer.php';
    exit;
}
?>


<h1 style="color:white; text-align: center;">Games in Our Store</h1>



<?php

while ($row = $query->fetch_assoc()) {
    echo "<td>";
    echo "<tr><a href='gamedetails.php?id=", $row['id'], "'>", "<img id='image' src=", $row['Image'], "  width='250' height='400' /></tr>";
    echo "</td>";
}
?>



<?php

require 'includes/footer.php';
