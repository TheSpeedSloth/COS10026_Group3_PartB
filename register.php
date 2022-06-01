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
    <title>Register</title>
    <link rel="stylesheet" href="styles/style.css">
    <?php
        $error = "";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if($conn) {
            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password1 = $_POST['password1'];
                $password2 = $_POST['password2'];
                $query = "CREATE TABLE IF NOT EXISTS users ( user_index INT NOT NULL AUTO_INCREMENT PRIMARY KEY , username VARCHAR(25) NOT NULL , password VARCHAR(60) NOT NULL );";
                $result = mysqli_query($conn, $query);
                $query = "SELECT username, password FROM users WHERE username = '$username'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                if(!$row) {
                    if(strcmp($password1, $password2) == 0) {
                        $password = password_hash($password1, PASSWORD_DEFAULT);
                        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
                        $result = mysqli_query($conn, $query);
                        $_SESSION['username'] = $username;
                        header("Location: manage.php");
                    } else {
                        $error = "Passwords do not match.";
                    }
                } else {
                    $error = "Username taken.";
                }
            }
        } else {
            $error = "Database could not be accessed.";
        }
    ?>
</head>
<body>
    <?php include("header.inc"); ?>
    <h1>Register</h1>
    <form method="post">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password1">Password</label><br>
        <input type="password" id="password1" name="password1" required><br>
        <label for="password2">Confirm password</label><br>
        <input type="password" id="password2" name="password2" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="login.php">Login</a>
    <?php echo "<p>$error</p>"; ?>
    <?php include("footer.inc"); ?>
</body>
</html>