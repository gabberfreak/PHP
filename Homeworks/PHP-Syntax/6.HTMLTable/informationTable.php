<?php
    $name = "Gosho";
    $number = "0882-321-423";
    $age = "24";
    $address = "Hadji Dimitar"
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Information Table</title>

    <style>
        table {
            border-collapse: collapse;
        }

        table td,th {
            border: 1px solid black;
            padding: 5px;
        }
        th {
            text-align: left;
            background-color: #fd9b01;
        }
        td {
            text-align: right;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Name</th>
        <td><?php echo $name; ?></td>
    </tr>
    <tr>
        <th>Phone number</th>
        <td><?php echo $number;?></td>
    </tr>
    <tr>
        <th>Age</th>
        <td><?php echo $age; ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $address; ?></td>
    </tr>
</table>
</body>
</html>