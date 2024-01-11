<?php
$conn = new mysqli("localhost", "root", "", "anki_db");

$query = "CREATE TABLE IF NOT EXISTS anki_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email TEXT NOT NULL,
    password TEXT NOT NULL
);";

$conn->query($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($password !== $confirmPassword) {
        $message .= "<p>Passwords do not match. Please try again.</p>";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO anki_users (email, password) VALUES ('$email', '$hashedPassword')";
        $result = $conn->query($query);
        if ($result) {
            $message .= "<p>Registration successful. <a href='login.php'>Login here</a></p>";
        } else {
            $message .= "Error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="new/index.css">
</head>
<body>
    <main>
        <?php echo $message ?>
        <h1>REGISTER</h1>
        <form action="" method="post">
            <div>
                <label>Mail:</label>
                <input type="email" name="email" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <label>Confirm Password:</label>
                <input type="password" name="confirm_password" required>
                <input type="submit" value="Sign Up">
            </div>
        </form> 
    </main>
</body>
</html>
