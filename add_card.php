<?php
session_start();

$conn = new mysqli("localhost", "root", "", "anki_db");

if(isset($_SESSION['tableName'])) {
    $table_name = $_SESSION['tableName'];
    $front = $_POST["front"];
    $back = $_POST["back"];
    
    if (empty($front) && empty($back))
    {
        $conn->close();
        header("Location: deck_face.php");
    }

    $sql = "INSERT INTO $table_name (frontcard, backcard) VALUES ('$front', '$back')";
    
    echo "a";
    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Tablo adı POST ile gönderilmedi.";
}

$conn->close();
header("Location: deck_face.php")
?>
