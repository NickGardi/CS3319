<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
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
<h1>Purchase</h1>
<?php
require_once 'connection.php';
$customersSelect ="";
$sql = "SELECT cusID, firstname, lastname FROM customer order by lastname";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $customersSelect = "<select id=\"customers\" name=\"customers\">";
     while($row = $result->fetch_assoc()) {
         $customersSelect.="<option value='".$row["cusID"]."'>".$row["lastname"]."</option>";
    }
    $customersSelect.="</select>";
}

$productsSelect ="";
$sql = "SELECT prodID, description FROM product order by description";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $productsSelect = "<select id=\"product\" name=\"product\">";
    while($row = $result->fetch_assoc()) {
        $productsSelect.="<option value='".$row["prodID"]."'>".$row["description"]."</option>";
    }
    $productsSelect.="</select>";
}

$conn->close();
?>


<form action="insert_purchase.php" method="post">
    <table id="customers">
        <tbody><tr>
            <th colspan="2">Purchase</th>
        </tr>
        <tr>
            <td>Customer:</td>
            <td><?php echo $customersSelect; ?></td>
        </tr>

        <tr>
            <td>Product:</td>
            <td><?php echo $productsSelect; ?></td>
        </tr>

        <tr>
            <td>Quantity:</td>
            <td><input type="number" min="1" max="" name="quantity"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="Submit"></td>
        </tr>
        </tbody></table>

</form>
</body>
</html>