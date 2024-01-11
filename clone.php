<?php
session_start();

$conn = new mysqli("localhost", "root", "", "anki_db");

$gelenTablo = $_SESSION['tableName'];

$yeniTablo = "cloneTable";

$sql = "CREATE TABLE IF NOT EXISTS $yeniTablo AS SELECT * FROM $gelenTablo";

if ($conn->query($sql) === TRUE) {
    echo "OK";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$_SESSION['tableName'] = $yeniTablo;

$conn->close();
header("Location: game.php");
?>
