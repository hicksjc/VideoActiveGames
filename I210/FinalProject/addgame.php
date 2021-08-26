<?php
/*
 * Author: James Hicks, Zachariah Green, Theodore Yiannoutsos, Connor Bryant
 * Date: 12/03/2019
 * File: addgame.php
 * Description: This script displays a form to accept a new games details.
 * 
 */
$page_title = "VideoActive games add a new game";
require_once 'includes/header.php';
?>

<h2 style="color: white; text-align: center;">Add New Game</h2>

<form action="insertgame.php" method="post">
    
    <table cellspacing="0" cellpadding="3" style="padding:5px; margin-bottom: 10px; color: white; margin-left: 25%">
        <tr>
            <td style="text-align: right; width: 100px">Title: </td>
            <td><input name="Title" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right;">Category:</td>
            <td>
                <select name="Category_id">
                    <option value="1">First Person Shooter</option>
                    <option value="2">Action-Adventure</option>
                    <option value="3">RPG</option>
                    <option value="4">Survival Horror</option>
                    <option value="5">Indie</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;">Developer: </td>
            <td><input name="Developer" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Release date: </td>
            <td>
                <input name="Release_date" type="text" size="40" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required />
                <span style="font-size: small">YYYY-MM-DD</span>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">Price: </td>
            <td><input name="price" type="number" step="0.01" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Image: </td>
            <td><input name="Image" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right; vertical-align: top">Description:</td>
            <td><textarea name="description" rows="6" cols="65"></textarea></td>
        </tr>
    </table>
     
       
    <div style='text-align-last: center;'>
        <input type="submit" value="Add Game" />
        <input type="button" value="Cancel" onclick="window.location.href = 'listgames.php'" />
    </div>
</form>

<?php
require_once 'includes/footer.php';
