<?php require_once("settings.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attempt Table Manager</title>
    <link rel="stylesheet" href="styles/style.css">
    <?php
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if(!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            if(isset($_POST['submit'])) {
                $id = htmlspecialchars($_POST['id']);
                $first_name = htmlspecialchars($_POST['first_name']);
                $last_name = htmlspecialchars($_POST['last_name']);
                $query = "SELECT $sql_id, $sql_first_name, $sql_last_name, $sql_attempt_no, $sql_score FROM attempts WHERE $sql_id LIKE %$id% AND $sql_first_name LIKE %$first_name% AND $sql_last_name LIKE %$last_name%;";
            } else if(isset($_POST['perfect'])) {
                $query = "SELECT $sql_id, $sql_first_name, $sql_last_name, $sql_attempt_no, $sql_score FROM attempts WHERE $sql_attempt_no = 1 AND $sql_score = 13;";
            } else if(isset($_POST['fail'])) {
                $query = "SELECT $sql_id, $sql_first_name, $sql_last_name, $sql_attempt_no, $sql_score FROM attempts WHERE $sql_attempt_no = 2 AND $sql_score < 7;";
            } else if($_GET['edit']) {
                $query = $_GET['query'];
            } else if($_GET['delete']) {
                $id = $_GET['id'];
                $query = "DELETE FROM attempts WHERE $sql_id = $id;";
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                if(!$conn) {
                    echo "<p>Database connection failure</p>";
                } else {
                    $result = mysqli_query($conn, $query);
                    if(!$result) {
                        echo "<p>Something is wrong with ", $query, "</p>";
                    } else {
                        echo "<p>Table has been updated</p>";
                        mysqli_free_result($result);
                    }
                    mysqli_close($conn);
                }
                $query = $_GET['query'];
            } else if($_POST['edit']) {
                $score = $_POST['score'];
                $id = $_GET['id'];
                $query = "UPDATE attempts SET $sql_score = $score WHERE $sql_id = $id;";
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                if(!$conn) {
                    echo "<p>Database connection failure</p>";
                } else {
                    $result = mysqli_query($conn, $query);
                    if(!$result) {
                        echo "<p>Something is wrong with ", $query, "</p>";
                    } else {
                        echo "<p>Table has been updated</p>";
                        mysqli_free_result($result);
                    }
                    mysqli_close($conn);
                }
                $query = $_GET['query'];
            } else {
                $query = "SELECT $sql_id, $sql_first_name, $sql_last_name, $sql_attempt_no, $sql_score FROM attempts;";
            }
        }
    ?>
</head>
<body>
    <h1>Student search</h1>
    <form method="post">
        <label for="id">Student ID</label>
        <input type="number" id="id" name="id"><br>
        <label for="first_name">First name</label>
        <input type="text" id="first_name" name="first_name"><br>
        <label for="last_name">Last name</label>
        <input type="text" id="last_name" name="last_name"><br>
        <button type="submit" name="search">Search</button><br>
        <button type="submit" name="perfect">List perfect scores</button><br>
        <button type="submit" name="fail">List failed students</button>
    </form>
    <?php
        $result = mysqli_query($conn, $query);
        if(!$result) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
            echo "<table border=\"1\">\n"
                ."<tr>\n"
                ."<th scope=\"col\">Student ID</th>\n"
                ."<th scope=\"col\">First Name</th>\n"
                ."<th scope=\"col\">Last Name</th>\n"
                ."<th scope=\"col\">Attempt No.</th>\n"
                ."<th scope=\"col\">Score</th>\n"
                ."<th scope=\"col\">Edit</th>\n"
                ."<th scope=\"col\">Delete</th>\n"
                ."</tr>\n";
            if(!isset($_GET['edit'])) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n"
                        ."<td>", $row[$sql_id], "</td>\n"
                        ."<td>", $row[$sql_first_name], "</td>\n"
                        ."<td>", $row[$sql_last_name], "</td>\n"
                        ."<td>", $row[$sql_attempt_no], "</td>\n"
                        ."<td>", $row[$sql_score], "</td>\n"
                        ."<td><a href=\"manage.php?edit=true&id=", $row[$sql_id], "&query=", $query, "\"Edit</a></td>\n"
                        ."<td><a href=\"manage.php?delete=true&id=", $row[$sql_id], "&query=", $query, "\"Delete</a></td>\n"
                        ."</tr>\n";
                }
            } else {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row[$sql_id] == $_GET['id']) {
                        echo "<tr>\n"
                        ."<td>", $row[$sql_id], "</td>\n"
                        ."<td>", $row[$sql_first_name], "</td>\n"
                        ."<td>", $row[$sql_last_name], "</td>\n"
                        ."<td>", $row[$sql_attempt_no], "</td>\n"
                        ."<td>"
                        ."<form method\"post\" action=\"manage.php?id=", $row[$sql_id], "&query=", $query, "\"><input size=\"2\" type=\"number\" id=\"score\" name=\"score\" value=\"", $row[$sql_score], "\" required><button type=\"submit\" name=\"edit\" style=\"display:none\">Edit</button></form>"
                        ."</td>\n"
                        ."<td><a href=\"manage.php?edit=true&id=", $row[$sql_id], "&query=", $query, "\"Edit</a></td>\n"
                        ."<td><a href=\"manage.php?delete=true&id=", $row[$sql_id], "&query=", $query, "\"Delete</a></td>\n"
                        ."</tr>\n";
                    } else {
                        echo "<tr>\n"
                        ."<td>", $row[$sql_id], "</td>\n"
                        ."<td>", $row[$sql_first_name], "</td>\n"
                        ."<td>", $row[$sql_last_name], "</td>\n"
                        ."<td>", $row[$sql_attempt_no], "</td>\n"
                        ."<td>", $row[$sql_score], "</td>\n"
                        ."<td><a href=\"manage.php?edit=true&id=", $row[$sql_id], "&query=", $query, "\"Edit</a></td>\n"
                        ."<td><a href=\"manage.php?delete=true&id=", $row[$sql_id], "&query=", $query, "\"Delete</a></td>\n"
                        ."</tr>\n";
                    }
                }
            }
            echo "</table>\n";
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    ?>
</body>
</html>