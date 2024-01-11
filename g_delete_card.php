<?php
session_start();
$conn = new mysqli("localhost", "root", "", "anki_db");

$kullaniciId = $_POST["idValue"];
$tableName = $_SESSION["tableName"];

$sql = "DELETE FROM $tableName WHERE id = $kullaniciId";

if ($conn->query($sql) === TRUE) {
    echo "OK";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: game.php")
?>
