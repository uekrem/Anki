<?php
session_start();

echo $_SESSION['tableName'];
echo $_GET['data'];
$conn = new mysqli("localhost", "root", "", "anki_db");

$id = $_GET['data'];
$tableName = $_SESSION['tableName'];
$sql = "DELETE FROM $tableName WHERE id = $id";
if ($conn->query($sql) === TRUE){
    echo "OK";
} 
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: delete_card_face.php");
?>