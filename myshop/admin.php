<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "store";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
        img {
            width: 70px;
        }
    </style>
</head>
<body>

<h1>Admin Dashboard - Product List</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price (SAR)</th>
        <th>Image</th>
    </tr>
    <?php
  
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td><img src='images/" . $row['image'] . "' alt='Product Image'></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No products found in the database.</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>