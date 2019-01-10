<?php
/*
Author:  Sajibe kanti 
*/
?>

<?php
session_start();
if(!isset($_SESSION["userid"])){
header("Location: index.html");
exit(); }
?>
