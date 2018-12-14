<?php
require_once 'connection.php';

$cusID       = filter_input(INPUT_POST, 'cusID', FILTER_VALIDATE_INT);
$phonenumber = filter_input(INPUT_POST, 'phonenumber');
$cusimage = filter_input(INPUT_POST, 'cusimage');
$extra = "";
if ($cusimage){
    $extra = ", cusimage = '$cusimage' ";
}
if ($cusID){
    $sql = "UPDATE customer set phonenumber='$phonenumber' $extra WHERE cusID=".$cusID;
    if ($conn->query($sql) === TRUE) {
        header("location:customers.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();