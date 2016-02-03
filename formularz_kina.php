<?php

$servername = "localhost";
$username = "root";
$password = "coderslab";
$baseName = "cwiczenia";


//Tworzenie nowe polacznie

$conn = new mysqli($servername, $username, $password, $baseName);

$name = '';
$address = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['name']) && strlen($_POST['name']) > 2) {
        $name = trim($_POST['name']);
    }
    if (isset($_POST['address']) && strlen($_POST['address']) > 2) {
        $address = trim($_POST['address']);
    }
    if ($name && $address) {

        echo 'Poprawnie wypelniony formularz <br>';
    }else {
        echo 'Wypelnij ponownie <br>';
        echo "<br>";
    }

}
$sql = "INSERT INTO Kino(name, address) VALUES ('$_POST[name]','$_POST[address]')";

                if ($conn -> query ($sql) === TRUE) {
                    echo "Nowy user został dodany";
                } else {
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

        <legend>Kina</legend>
        <p>
            <label>
Nazwa:
                <input type="text" name="name" placeholder="Podaj nazwe kina" value="<?php echo $name; ?>">
            </label>
        </p>
        <p>
            <label>
Adres
                <input type="text" name="address" placeholder="Podaj adres kina" value="<?php echo $address; ?>">
            </label>
        </p>
        <p>
            <label>
                <input type="submit" value="Wyslij">


<





?>

</body>
</html>