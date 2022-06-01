<?php
    require_once("settings.php");

    session_start();
    if(empty($_SESSION['username'])) {
        $_SESSION['username'] = "";
    }

    $active = "manage";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
    <?php
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if($conn) {
            $error = "You are not logged in.";
            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $query = "CREATE TABLE IF NOT EXISTS users ( user_index INT NOT NULL AUTO_INCREMENT PRIMARY KEY , username VARCHAR(25) NOT NULL , password VARCHAR(60) NOT NULL );";
                $result = mysqli_query($conn, $query);
                $query = "SELECT username, password FROM users WHERE username = '$username'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                if($row) {
                    if(password_verify($password, $row['password'])) {
                        $_SESSION['username'] = $username;
                        header("Location: manage.php");
                    } else {
                        $error = "Incorrect password.";
                    }
                } else {
                    $error = "Username not found.";
                }
            }
        } else {
            $error = "Database could not be accessed.";
        }
    ?>
</head>
<body>
    <?php include("header.inc"); ?>
    <h1>Login</h1>
    <form method="post">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="register.php">Register</a>
    <?php echo "<p>$error</p>"; ?>
    <?php include("footer.inc"); ?>
</body>
</html>