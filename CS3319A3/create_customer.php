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
<h1>Create Customer</h1>
<form action="insert_customer.php" method="post">
    <table id="customers">
        <tbody><tr>
            <th colspan="2">Customer</th>
        </tr>
        <tr>
            <td>Id:</td>
            <td><input type="text" maxlength="2" name="cusID"></td>
        </tr>

        <tr>
            <td>Firstname:</td>
            <td><input name="firstname" type="text"></td>
        </tr>

        <tr>
            <td>Lastname:</td>
            <td><input name="lastname" type="text"></td>
        </tr>

        <tr>
            <td>City:</td>
            <td><input name="city" type="text"></td>
        </tr>

        <tr>
            <td>Phone Number:</td>
            <td><input type="tel" name="phonenumber"></td>
        </tr>

        <tr>
            <td>Agent Id:</td>
            <td><input type="text" maxlength="2"  name="agentID"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="Submit"></td>
        </tr>
        </tbody></table>

</form>
</body>
</html>