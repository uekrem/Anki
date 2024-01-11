<?php

$conn = new mysqli("localhost", "root", "", "anki_db");

session_start();
$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    $i = 0;
    while($row = $result->fetch_assoc()) {
        $tableName = $row["Tables_in_anki_db"];
        if ($tableName == "anki_users")
            continue;
        echo "<div class=\"liDiv\" ><li><a id=\"$i\" onclick=\"PHPWithQueryString($i)\">" . 
        $tableName . "</a></li><button class=\"liBtn\" onclick=\"PHPWithDelete($i)\" type=\"button\"></button></div>";
        $i += 1;
    }

    echo "</ul>";
}
if ($result->num_rows == 1){
    echo "No deck available";
}

$conn->close();
?>