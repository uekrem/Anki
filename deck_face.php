<?php
session_start();

if (!empty($_GET["data"]))
    $_SESSION['tableName'] = $_GET["data"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="new/deck_face.css">
</head>
<body>
    <main>
        <form id="redirectForm" method="post">
            <div class="dropdown">
                <input type="submit"  class="dropdown-button non-clickable" value="Add Card">
                <div class="dropdown-content">
                    <input type="text" placeholder="Enter card's front face" name="front">
                    <input type="text" placeholder="Enter card's back face" name="back">
                    <input type="submit" value="Add Card" onclick="redirect('add_card.php')">
                </div>
            </div>
            <input type="submit" value="Show Cards" onclick="redirect('delete_card_face.php')">
            <input type="submit" value="Start Game" onclick="redirect('clone.php')">
            <div class="dropdown">
                <input type="submit" class="dropdown-button non-clickable" value="Turn Back">
                <div class="dropdown-content turn">
                    <label>If you leave, your progress will be deleted. Are you sure?</label>
                    <input type="submit" value="Turn Back" onclick="redirect('main.php')">
                </div>
            </div>
        </form>
    </main>
    <script>
        function redirect(destination)
        {
            document.getElementById('redirectForm').action = destination;
        }
    </script>
</body>
</html>