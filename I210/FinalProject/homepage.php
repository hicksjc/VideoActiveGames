
<?php
/**
 * Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 11/15/2019
 * Description: This is the homepage of our weebsite, Videoactive Gaming.
 */
$page_title = "Game Home";


include ('includes/header.php');
?>

<link rel="stylesheet" type="text/css" href="www/css/style.css">

<!--<h1 style="text-align: center; color:white;">Welcome to VideoActive Games</h1>-->
<img style="text-align: center;" src="www/images/box.gif" alt="box" width="100" height="100" hspace="20" />
<img style="text-align: center;" src="www/images/banner-Education.png" alt="banner" width="1050" height="100" >
<img style="text-align: center;" src="www/images/box.gif" alt="box" width="100" height="100" />



<p style = "color: white">Here at VideoActive Games we sell video games at a fair price and in a timely manner.
    We sell whatever type of game you could ever want, including but not limited to: action, racing, sports, puzzle, FPS,
    and role-playing games. Shop here for all your gaming needs!</p>
<div class="row">
    <div class="column">
        <h2>Main features include:</h2>
        <ul>
            <li>List of games</li>
            <li>Search games with keywords in game titles</li>
            <li>Login/logout</li>
            <li>Register/create new accounts</li>
            <li>Add new games, delete games, and editing games (administrators only)</li>

        </ul>


        <img src="www/images/mario3.gif" width="1500" height="180" />


    </div>
    <div class="column">
        <h2>Demo account user and password:</h2>
        <p>Guest account: guest, password</p>
        <p>Admin account: admin, password</p>


    </div>

</div>




<h6 style = "color:white">
    <i>For the purpose of this demo application, editing and deleting features are disallowed for existing games. You need to add a new game first and then try these features on the new games.
    </i>

    <i>Note: To check out, you need to login with the <strong>guest</strong> account credentials.
        The <strong>admin</strong> account allows editing game details and deleting games.
        Please note that game details are stored in a MySQL database and changes are permanent.</i></h6>
</h6>



<?php
include ('includes/footer.php');
