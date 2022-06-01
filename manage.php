<?php require_once("settings.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attempt Table Manager</title>
    <link rel="stylesheet" href="styles/style.css">
    <?php
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db); // Connect to database
        if(!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            // Work out which query to do
            if(isset($_POST['search'])) { // Search for student
                $id = htmlspecialchars($_POST['id']);
                $first_name = htmlspecialchars($_POST['first_name']);
                $last_name = htmlspecialchars($_POST['last_name']);
                $query = "SELECT attempt_index, student_id, given_name, family_name, attempt_no, score FROM attempts WHERE student_id = $id AND given_name LIKE '%$first_name%' AND family_name LIKE '%$last_name%';";
            } else if(isset($_POST['perfect'])) { // Find perfect scores
                $query = "SELECT attempt_index, student_id, given_name, family_name, attempt_no, score FROM attempts WHERE attempt_no = 1 AND score = 13;";
            } else if(isset($_POST['fail'])) { // Find failed students
                $query = "SELECT attempt_index, student_id, given_name, family_name, attempt_no, score FROM attempts WHERE attempt_no = 2 AND score < 7;";
            } else if(isset($_GET['edit'])) { // Refresh page for editing
                $query = $_GET['query'];
            } else if(isset($_GET['delete'])) { // Delete student's attempts
                $id = $_GET['id'];
                $query = "DELETE FROM attempts WHERE student_id = $id;";
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                if(!$conn) {
                    echo "<p>Database connection failure</p>";
                } else {
                    $result = mysqli_query($conn, $query);
                    if(!$result) {
                        echo "<p>Something is wrong with ", $query, "</p>";
                    } else {
                        echo "<p>Table has been updated</p>";
                    }
                }
                $query = $_GET['query'];
            } else if(isset($_POST['edit'])) { // Update score of attempt
                $score = $_POST['score'];
                $index = $_GET['index'];
                $query = "UPDATE attempts SET score = $score WHERE attempt_index = $index;";
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                if(!$conn) {
                    echo "<p>Database connection failure</p>";
                } else {
                    $result = mysqli_query($conn, $query);
                    if(!$result) {
                        echo "<p>Something is wrong with ", $query, "</p>";
                    } else {
                        echo "<p>Table has been updated</p>";
                    }
                }
                $query = $_GET['query'];
            } else {
                $query = "SELECT attempt_index, student_id, given_name, family_name, attempt_no, score FROM attempts;";
            }
        }
    ?>
</head>
<body>
    <?php $active = "manage";?>
    <?php include 'header.inc';?>
    <h1>Student search</h1>
    <form method="post">
        <label for="id">Student ID</label>
        <input type="text" id="id" name="id"><br>
        <label for="first_name">First name</label>
        <input type="text" id="first_name" name="first_name"><br>
        <label for="last_name">Last name</label>
        <input type="text" id="last_name" name="last_name"><br>
        <input type="submit" name="search" value="Search" /><br>
        <input type="submit" name="perfect" value="List perfect scores" /><br>
        <input type="submit" name="fail" value="List failed students" /><br>
    </form>
    <?php
        $result = mysqli_query($conn, $query); // Run query 
        if(!$result) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
            echo "<table>\n"
                ."<tr>\n"
                ."<th scope=\"col\">Student ID</th>\n"
                ."<th scope=\"col\">First Name</th>\n"
                ."<th scope=\"col\">Last Name</th>\n"
                ."<th scope=\"col\">Attempt No.</th>\n"
                ."<th scope=\"col\">Score</th>\n"
                ."<th scope=\"col\">Edit</th>\n"
                ."<th scope=\"col\">Delete</th>\n"
                ."</tr>\n";
            if(!isset($_GET['edit'])) { // Regular display
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n"
                        ."<td>", $row['student_id'], "</td>\n"
                        ."<td>", $row['given_name'], "</td>\n"
                        ."<td>", $row['family_name'], "</td>\n"
                        ."<td>", $row['attempt_no'], "</td>\n"
                        ."<td>", $row['score'], "</td>\n"
                        ."<td><a href=\"manage.php?edit=true&index=", $row['attempt_index'], "&query=", $query, "\">Edit</a></td>\n"
                        ."<td><a href=\"manage.php?delete=true&id=", $row['student_id'], "&query=", $query, "\">Delete</a></td>\n"
                        ."</tr>\n";
                }
            } else { // If page is in edit mode then find row to edit and create an input to enter new score
                while($row = mysqli_fetch_assoc($result)) {
                    if($row['student_id'] == $_GET['id']) {
                        echo "<tr>\n"
                        ."<td>", $row['student_id'], "</td>\n"
                        ."<td>", $row['given_name'], "</td>\n"
                        ."<td>", $row['family_name'], "</td>\n"
                        ."<td>", $row['attempt_no'], "</td>\n"
                        ."<td>"
                        ."<form method=\"post\" action=\"manage.php?index=", $row['attempt_index'], "&query=", $query, "\"><input size=\"2\" type=\"number\" id=\"score\" name=\"score\" value=\"", $row['score'], "\" required><button type=\"submit\" name=\"edit\" style=\"display:none\">Edit</button></form>"
                        ."</td>\n"
                        ."<td><a href=\"manage.php?edit=true&index=", $row['attempt_index'], "&query=", $query, "\">Edit</a></td>\n"
                        ."<td><a href=\"manage.php?delete=true&id=", $row['student_id'], "&query=", $query, "\">Delete</a></td>\n"
                        ."</tr>\n";
                    } else {
                        echo "<tr>\n"
                        ."<td>", $row['student_id'], "</td>\n"
                        ."<td>", $row['given_name'], "</td>\n"
                        ."<td>", $row['family_name'], "</td>\n"
                        ."<td>", $row['attempt_no'], "</td>\n"
                        ."<td>", $row['score'], "</td>\n"
                        ."<td><a href=\"manage.php?edit=true&index=", $row['attempt_index'], "&query=", $query, "\">Edit</a></td>\n"
                        ."<td><a href=\"manage.php?delete=true&id=", $row['student_id'], "&query=", $query, "\">Delete</a></td>\n"
                        ."</tr>\n";
                    }
                }
            }
            echo "</table>\n";
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    ?>
    <?php include 'footer.inc';?>
</body>
</html>