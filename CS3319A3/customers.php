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
        #customers td img{
            max-width: 150px;
        }
    </style>
</head>
<body>
<?php require_once 'menu.php'; ?>

<?php
require_once 'connection.php';

$sql = "SELECT * FROM customer order by lastname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table id=\"customers\"><tr>
<th>ID</th>
<th>Avatar</th>
<th>Name</th>
<th>City</th>
<th>Phonenumber</th>
<th>Actions</th>

</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $image = "<input type='text' name='cusimage' placeholder='image url'>";
        if (!empty($row["cusimage"])){
            $image = "<img src='".$row["cusimage"]."'>";
        }
        echo "<form action='update_phone.php' method='post'><tr>
            <td>".$row["cusID"]."</td>
            <td>".$image."</td>
            <td>".$row["firstname"]." ".$row["lastname"]."</td>
            <td>".$row["city"]."</td>
            <td><input type='hidden' name='cusID' value='".$row["cusID"]."'><input type='text' name='phonenumber' value='".$row["phonenumber"]."'><input type='submit' value='Update Phone / avatar'></td>
            <td><a href='purchased_products.php?cusId=".$row["cusID"]."'>Purchased products</a> &nbsp;&nbsp; <a href='delete_customer.php?cusId=".$row["cusID"]."'>Delete customer</a></td></tr></form>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>

