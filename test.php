<?php
$servername = "localhost";
$username = "root";
$password = "coderslab";
$baseName = "cwiczenia";


//Tworzenie nowe polacznie
$conn = new mysqli($servername, $username, $password, $baseName);



$sql = "SELECT * FROM Kino";
$result = $conn -> query($sql);

if($result -> num_rows > 0){
    While($row = $result -> fetch_assoc()){
        echo("nazwa ".$row["name"]). " adres ".$row["address"]."<br>";
    }
} else {
echo "Brak wynikow";
}

$sql = "SELECT * FROM Film";
$result = $conn -> query($sql);

if($result -> num_rows > 0){
    While($row = $result -> fetch_assoc()){
        echo("nazwa ".$row["name"])." Ocena ".$row["rating"]. " Opis filmu  ".$row["opis"]."<br>";
    }
} else {
    echo "Brak wynikow";
}

$sql = "SELECT * FROM Bilet";
$result = $conn -> query($sql);

if($result -> num_rows > 0){
    While($row = $result -> fetch_assoc()){
        echo("ilosc ".$row["ilosc"]). " Cena  ".$row["cena"]."<br>";
    }
} else {
    echo "Brak wynikow";
}

$sql = "SELECT * FROM Platnosci";
$result = $conn -> query($sql);

if($result -> num_rows > 0){
    While($row = $result -> fetch_assoc()){
        echo("typ ".$row["typ"]). " Data  ".$row["date"]."<br>";
    }
} else {
    echo "Brak wynikow";
}


//Niszcznie połącznia
$conn -> close();
$conn = null;
?>