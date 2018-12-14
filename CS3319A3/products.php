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
<h1>Products</h1>
<?php
require_once 'connection.php';

$order ="";

if (isset($_GET['orderby'])){
    $order = " ORDER BY ".$_GET['orderby'];
    if (isset($_GET['order'])){
        $order .= " ".$_GET['order'];
    }
}

$sql = "SELECT * FROM product $order";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table id=\"customers\"><tr>
<th>Description <a href='?orderby=description&order=asc'>[ASC]</a> <a href='?orderby=description&order=desc'>[DESC]</a> </th>
<th>Cost <a href='?orderby=cost&order=asc'>[ASC]</a> <a href='?orderby=cost&order=desc'>[DESC]</a> </th>
<th>Quantity on Hand <a href='?orderby=quantityonhand&order=asc'>[ASC]</a> <a href='?orderby=quantityonhand&order=desc'>[DESC]</a> </th>

</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["description"]."</td>
        <td>".$row["cost"]."</td>
        <td>".$row["quantityonhand"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>