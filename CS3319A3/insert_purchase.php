<?php
require_once 'connection.php';

$cusID    = filter_input(INPUT_POST, 'customers', FILTER_VALIDATE_INT);
$prodID   = filter_input(INPUT_POST, 'product', FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
if ($cusID && $prodID && $quantity){
    $sql = "REPLACE INTO purchases(cusID, prodID, Quantity) VALUES ($cusID, $prodID, $quantity);";
    if ($conn->query($sql) === TRUE) {
        header("location:purchased_products.php?cusId=".$cusID);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();