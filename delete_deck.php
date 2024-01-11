<?php
    $conn = new mysqli("localhost", "root", "", "anki_db");

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }
    
    $tableName = $_POST['card_name'];
    
    $sql = "DROP TABLE IF EXISTS $tableName";
    
    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $conn->error;
    }
    
    $conn->close();
    header("Location: main.php");
?>