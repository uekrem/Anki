<?php
$conn = new mysqli("localhost", "root", "", "anki_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    session_start();

    $query = "SELECT * FROM anki_users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) 
        {
            $_SESSION['mail'] = $email;
            header("Location: main.php");
        } 
        else 
        {
            $message .= 'Wrong password';
        }
    } 
    else 
    {
        $message .= 'There is no such email';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="new/login.css">
</head>
<body>
    <main>
        <?php echo $message ?>
        <h1>LOGIN</h1>
        <form action="" method="post">
            <div>
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <input type="submit" value="Login">
            </div>
        </form>
    </main>
</body>
</html>