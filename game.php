<?php
session_start();
$conn = new mysqli("localhost", "root", "", "anki_db");

$tableName = $_SESSION["tableName"];

$sql = "SELECT * FROM $tableName ORDER BY RAND() LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $front = $row["frontcard"];
    $back = $row["backcard"];
}
else{
    header("Location: main.php");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="new/game.css">
    <style>
    div.on{
        position: absolute;
        background-color: rgb(222, 222, 234);
    }

    div.arka{
        background-color: rgb(152, 152, 177);
        transform: rotateY(-180deg);
    }
    </style>
</head>
<body>
    <main>
        <div class="box" id="card">
            <div class="on"><?php echo $front;?></div>
            <div class="arka"><?php echo $back;?></div>
        </div>
        <form action="g_delete_card.php" method="post" id="redirectForm">
            <input style="display:none;" type="checkbox" id="hoverCheckbox"> 
            <input style="display:none;" type="text" value="<?php echo $id;?>" name="idValue">
            <input type="submit" onclick="changeFormAction()" value="TURN BACK">
            <input type="submit" value="SKIP">
        </form>
    </main>
    <script>
        var hoverLabel = document.getElementById("card");
        var hoverCheckbox = document.getElementById("hoverCheckbox");

        hoverLabel.addEventListener("mouseenter", function() {
            document.getElementById('redirectForm').action = "";
        });

        function changeFormAction() {
        var myForm = document.getElementById('redirectForm');
        myForm.action = "deck_face.php";
        }
    </script>
</body>
</html>