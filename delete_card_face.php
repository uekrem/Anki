<?php
session_start();

$conn = new mysqli("localhost", "root", "", "anki_db");

$tabloAdi = $_SESSION['tableName'];

$sql = "SELECT * FROM $tabloAdi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $htmlOutput .= "<ul>";
    while ($row = $result->fetch_assoc()) {
        $htmlOutput .= "<li><b>FrontFace:</b>\"{$row['frontcard']}\"  <b>BackFace:</b>\"{$row['backcard']}\"
        <button class=\"liBtn\" onclick=\"PHPWithQueryString({$row['id']})\" type=\"button\"></button> </li>";
    }
    $htmlOutput .= "</ul>";
} else {
    $htmlOutput .= "<p>Table is empty</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="new/delete_card_face.css">
    <style>
        main{
            background-color: rgb(175, 175, 197);
        }
    </style>
</head>
<body>
    <main> 
        <?php echo $htmlOutput; ?>
        <form action="deck_face.php">
            <input type="submit" value="Turn Back">
        </form>
    </main>
    <script>
        function PHPWithQueryString(i) {
        window.location.href = 'delete_card.php?data=' + encodeURIComponent(i);
        }
    </script>
</body>
</html>
