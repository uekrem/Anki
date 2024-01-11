<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="new/main.css">
    <style>
    header {
        flex-direction:column;
        justify-content: center;
        align-items: center;
        row-gap:7%;
    }
    header > button{
        width:5%;
        height:30%;
        border-radius:5px;
    }
    header > p{
        font-size:25px;
    }
    </style>
</head>
<body>
    <header>
        <p>Welcome <?php session_start();echo $_SESSION['mail'];?></p>
        <button onclick="exitLog();">Log-out</button>
    </header>
    <main>
        <div class="container">
            <form action="" id="redirectForm" method="post">
                <input type="text" id="diff" name="card_name" placeholder="Enter a new deck" required>
                <input type="submit" value="ADD" onclick="redirect('add_deck.php')">
                <input style="display:none;" type="submit" id="delclick" value="DELETE" onclick="redirect('delete_deck.php')">
            </form>
            <h2>Your Decks:</h2>
            <div class="dbList">
                <?php
                    $conn = new mysqli("localhost", "root", "", "anki_db");
                    $sql = "DROP TABLE IF EXISTS cloneTable";
                    $conn->query($sql);
                    include 'show_deck.php'; 
                ?>
            </div>
        </div>
    </main>
    <script>
        function redirect(destination)
        {
            document.getElementById('redirectForm').action = destination;
        }
        function PHPWithQueryString(i)
        {
            var dataToSend = document.getElementById(i).innerHTML;
            window.location.href = 'deck_face.php?data=' + encodeURIComponent(dataToSend);
        }
        function PHPWithDelete(i)
        {
            var clickedElement = document.getElementById(i);
            var myInput = document.getElementById('diff');
            myInput.value = clickedElement.innerHTML;
            document.getElementById("delclick").click();
        }
        function exitLog(){
            window.location.href = 'login.php';
        }
        
    </script>
</body>
</html>