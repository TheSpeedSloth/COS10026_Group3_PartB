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

                $make = htmlspecialchars($_POST["carmake"]);
                $model = htmlspecialchars($_POST["carmodel"]);
                $price = htmlspecialchars($_POST["price"]);
                $yom = htmlspecialchars($_POST["yom"]);

                $query = "select * from cars where make like '$make%'";

                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "<p>Something is wrong with ", $query, "</p>";
                } else {
                    echo "<table border=\"1\">\n";
                    echo "<tr>\n"
                         ."<th scope=\"col\">Make</th>\n"
                         ."<th scope=\"col\">Model</th>\n"
                         ."<th scope=\"col\">Price</th>\n"
                         ."</tr>\n";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>\n";
                        echo "<td>", $row["make"], "</td>\n";
                        echo "<td>", $row["model"], "</td>\n";
                        echo "<td>", $row["price"], "</td>\n";
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