<?php
/*
Author: Sajibe kanti
*/
?>

<?php
$connection = mysql_connect('localhost', 'root', 'nekopoo',"bd");
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('meow');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
?>
