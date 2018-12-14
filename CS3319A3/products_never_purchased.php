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
<h1>Products never purchased</h1>
<?php
require_once 'connection.php';

$sql = "SELECT * FROM product WHERE prodID not in (SELECT DISTINCT prodID from purchases);";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table id=\"customers\"><tr>
<th>ID</th>
<th>Description </th>
<th>Cost </th>
<th>Quantity on Hand </th>

</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["prodID"]."</td>
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