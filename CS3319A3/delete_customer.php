<?php
require_once 'connection.php';

$cusID       = filter_input(INPUT_GET, 'cusId', FILTER_VALIDATE_INT);
if ($cusID){
    $sql = "DELETE FROM customer WHERE cusID=".$cusID;
    if ($conn->query($sql) === TRUE) {
        header("location:customers.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();