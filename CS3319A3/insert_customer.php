<?php
require_once 'connection.php';

$cusID    = filter_input(INPUT_POST, 'cusID', FILTER_VALIDATE_INT);
$agentID    = filter_input(INPUT_POST, 'agentID', FILTER_VALIDATE_INT);
$firstname   = filter_input(INPUT_POST, 'firstname');
$lastname   = filter_input(INPUT_POST, 'lastname');
$city = filter_input(INPUT_POST, 'city');
$phonenumber = filter_input(INPUT_POST, 'phonenumber');

if($cusID && $agentID){
    $sql = "INSERT INTO customer (cusID, firstname, lastname, city, phonenumber, agentID) 
VALUES ($cusID, '$firstname', '$lastname', '$city', '$phonenumber', '$agentID');";
    if ($conn->query($sql) === TRUE) {
        header("location:customers.php");
    } else {
        echo "Error: The ID already exists, try with a different one<br>";
    }
}
$conn->close();