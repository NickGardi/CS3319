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
<h1>List all the customer names who bought more than a given quantity of any product. </h1>
<form method="get">
    <table id="customers">
        <tbody><tr>
            <th colspan="3">Customer by quantity of any product</th>
        </tr>
        <tr>
            <td>Quantity:</td>
            <td><input type="number" name="Quantity" value="<?php if (isset($_GET['Quantity'])){ echo $_GET['Quantity']; } else { echo '1'; }?>"></td>
            <td><input type="submit" name="Search"></td>
        </tr>

        </tbody></table>

</form>
<br><br>
<?php
require_once 'connection.php';

$order ="";

if (isset($_GET['Quantity'])){
    $quantity = filter_input(INPUT_GET, 'Quantity', FILTER_VALIDATE_INT);
    $sql = "SELECT firstname, lastname, pr.description, p.Quantity FROM purchases p inner join customer c on (p.cusID=c.cusID)
inner join product pr on (pr.prodID= p.prodID) WHERE Quantity>=".$quantity;

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table id=\"customers\"><tr>
<th>Name</th>
<th>Description</th>
<th>Quantity</th>

</tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
        <td>".$row["firstname"]." ".$row["lastname"]." </td>
        <td>".$row["description"]."</td>
        <td>".$row["Quantity"]."</td></tr>";
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