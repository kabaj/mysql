<?php
    $servername = "localhost";
    $username = "root";
    $password = "coderslab";
    $baseName = "Kino";


    //Tworzenie nowe polacznie
    $conn = new mysqli($servername, $username, $password, $baseName);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "INSERT INTO payment(typ) VALUES ('$_POST[typ]')";

        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Blad: " . $sql . "<br>" . $conn->error;

        }
        $sql = "INSERT INTO ticket(quantity,price) VALUES ('$_POST[quantity]','$_POST[price]')";

        if ($conn->query($sql) === TRUE) {
            echo "Nowy bilet został dodany";
        } else {
            echo "Blad: " . $sql . "<br>" . $conn->error;

        }
    }


    $cinemas = $conn->query('SELECT * FROM Cinemas;');

    if ($conn->error) {
        echo "Blad: " . $sql . "<br>" . $conn->error;
    }

?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8">
</head>

<body>

<form method="POST" >

        <legend>Zamówienie biletu</legend>
        <p>
            <label>
Ilość
                <input type="text" name="quantity" value="<?php echo $address; ?>">
            </label>
        </p>
        <p>
            <label>
                Cena
                <input type="text" name="price"  value="<?php echo $address; ?>">
            </label>
        </p>
    <label>
        Typ płatności
        <select name="typ">
            <option>Nieopłacone</option>
            <option>Gotowka</option>
            <option>Karta</option>
            <option>Przelew</option>
        </select>
    </label>

    <label>
        Kina
        <select name="kino">

            <?php while($cinema = $cinemas->fetch_assoc()) { ?>
                <option value="<?php echo $cinema['id'] ?>"><?php echo $cinema['name'] ?></option>
            <?php } ?>
        </select>
    </label>

    <label>
        <input type="submit" value="Kupuje">
    </label>
</form>


<?php

$sql = "SELECT * FROM payment JOIN ticket ON payment.id=ticket.id";
$result = $conn -> query($sql);
?>
<table>
    <tr>
        <td><b>Ilosc</b></td>
        <td><b>Cena</b></td>
        <td><b>Płatnosc</b></td>
    </tr>
        <?php
        while($row=$result -> fetch_assoc())
        {
            ?>
            <tr>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['typ']; ?></td>
            </tr>
            <?php } ?>
</table>
</body>
</html>



