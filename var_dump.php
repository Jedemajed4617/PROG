<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "progweek5";
 
// Create connection in mysqli
 
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
//Check connection in mysqli
if(!$mysqli){
    die("Error on the connection");
};
?>