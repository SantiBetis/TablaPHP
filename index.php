<?php
require_once './php/connection.php';

$con = connection();

$sql = "SELECT ProductID, ProductName, UnitsInStock FROM products";
$query = mysqli_query($con, $sql);




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos de Northwind</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: lightgreen;
        }
       
    </style>
</head>
<body>

    <h1>Lista de Productos - Northwind</h1>

    <table>
        <thead>
            <tr>
                <th>ID de Producto</th>
                <th>Nombre de Producto</th>
                <th>Unidades en Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($query) > 0): ?>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <td><?php echo $row["ProductID"]; ?></td>
                        <td><?php echo $row["ProductName"]; ?></td>
                        <td><?php echo $row["UnitsInStock"]; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No se encontraron productos</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>