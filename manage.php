<!DOCTYPE html>
<html lang="en">
    <body>
        <?php
            require_once ("settings.php");

            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

            if (!$conn) {
                echo "<p>Database connection failure</p>";
            } else {
                $sql_table = "attempts";

                $stuID = htmlspecialchars($_POST["stuID"]);
                $stuFirstName = htmlspecialchars($_POST["stuFirstName"]);
                $stuLastName = htmlspecialchars($_POST["stuLastName"]);
                $quizAttempts = htmlspecialchars($_POST["quizAttempts"]);

                $query = "select * from attempts";

                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "<p>Something is wrong with ", $query, "</p>";
                } else {
                    echo "<table border=\"1\">\n";
                    echo "<tr>\n"
                         ."<th scope=\"col\">Student ID</th>\n"
                         ."<th scope=\"col\">First Name</th>\n"
                         ."<th scope=\"col\">Last Name</th>\n"
                         ."<th scope=\"col\">Attempts</th>\n"
                         ."</tr>\n";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>\n";
                        echo "<td>", $row["stuID"], "</td>\n";
                        echo "<td>", $row["stuFirstName"], "</td>\n";
                        echo "<td>", $row["stuLastName"], "</td>\n";
                        echo "<td>", $row["quizAttempts"], "</td>\n";
                        echo "</tr>\n";
                    }

                    echo "</table>\n";

                    mysqli_free_result($result);
                }
                mysqli_close($conn);
            }
        ?>
    </body>
</html>