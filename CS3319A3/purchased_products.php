<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
<h1>Purchased products</h1>
<?php require_once 'menu.php'; ?>
<?php
require_once 'connection.php';
$cusID = filter_input(INPUT_GET, 'cusId', FILTER_VALIDATE_INT);
if ($cusID){
    $sql = "SELECT purchases.Quantity, product.description, product.cost FROM purchases inner join product on (purchases.prodID=product.prodID) WHERE cusID=".$cusID;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table id=\"customers\"><tr>
<th>Quantity</th>
<th>Description</th>
<th>Cost</th>
<th>Subtotal</th>

</tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>".$row["Quantity"]."</td>
            <td>".$row["description"]."</td>
            <td>".$row["cost"]."</td>
            <td>".($row["Quantity"]*$row["cost"])."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

$conn->close();
?>
</body>
</html>