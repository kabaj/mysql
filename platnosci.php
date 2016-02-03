<?php

$servername = "localhost";
$username = "root";
$password = "coderslab";
$baseName = "Kino";


//Tworzenie nowe polacznie
$conn = new mysqli($servername, $username, $password, $baseName);

$sql = "SELECT * FROM Plat";
$result = $conn -> query($sql);


?>


<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8">
</head>
<body>
        <?php if($result->num_rows > 0) { ?>
            <table>
                <th>Rodzaj</th>
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo($row["typ"]); ?></td>
                            <td><?php echo($row["name"]); ?></td>
                            <td><?php echo($row["order_details"]); ?></td>
                            <td><?php echo($row["typ"]); ?></td>
                            <td><?php echo($row["typ"]); ?></td>
                        </tr>
                    <?php } ?>
            </table>
        <?php } ?>
</body>
</html>

