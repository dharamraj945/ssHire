<?php


$username = "root";
$servername = "localhost";
$password = "";
$dbname = "u887553984_hireskill_8851";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

} else {
    // echo "connection Succesfull";
}