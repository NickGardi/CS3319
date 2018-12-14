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
<?php require_once 'menu.php'; ?>
<h1>Total money made by purchased products</h1>
<?php
require_once 'connection.php';
$prodID = filter_input(INPUT_GET, 'prodID', FILTER_VALIDATE_INT);
$filter="";
if ($prodID){
    $filter=" WHERE purchases.prodID=".$prodID;
}
$sql = "SELECT purchases.prodID, sum(purchases.Quantity) as Quantity, product.description, product.cost FROM purchases inner join product on (purchases.prodID=product.prodID) $filter  group by purchases.prodID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table id=\"customers\"><tr>
<th>Quantity</th>
<th>Description</th>
<th>Cost</th>
<th>Total money made</th>

</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["Quantity"]."</td>
        <td><a href='?prodID=".$row["prodID"]."'>".$row["description"]."</a></td>
        <td>".$row["cost"]."</td>
        <td>".($row["Quantity"]*$row["cost"])."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>