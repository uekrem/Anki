<?php
$conn = new mysqli("localhost", "root", "", "anki_db");

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$cardName = $_POST['card_name'];

$sql = "CREATE TABLE IF NOT EXISTS $cardName (
    id INT(6) UNSIGNED AUTO_INCREMENT  PRIMARY KEY,
    frontcard TEXT DEFAULT NULL,
    backcard TEXT DEFAULT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "OK";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
header("Location: main.php");
?>