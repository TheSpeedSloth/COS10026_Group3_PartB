<?php
require_once("classes/attempt.php");
require_once("settings.php");

function save($attempt, $attempt_no, $score, $conn) {
    $query = "INSERT INTO attempts (student_id, given_name, family_name, attempt_no, score) VALUES ('$attempt->student_id', '$attempt->given_name', '$attempt->family_name', '$attempt_no', '$score');";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        echo "<p>Something is wrong with ", $query, "</p>";
    } else {
        echo "<p>Your attempt has been submitted.</p>"
            ."<p>Name: $attempt->given_name $attempt->family_name<br>\n"
            ."Score: $score<br>\n"
            ."Attempt(s): $attempt_no</p>\n";
        if($attempt_no == 1) {
            echo "<p><a href=\"quiz.php\">Reattempt</a></p>";
        }
    }
}

if(isset($_POST["submit"])) {
    // Connect to MySQL database
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if($conn) {
        // Get inputs from POST array
        $studentID     = $_POST["studentID"];
        $givenName     = $_POST["givenName"];
        $familyName    = $_POST["familyName"];
        $history1      = $_POST["history1"];
        $history2      = $_POST["history2"];
        $history3      = $_POST["history3"];
        $smartCity1    = $_POST["smartCity1"];
        $smartCity2    = $_POST["smartCity2"];
        $smartCity3    = $_POST["smartCity3"];
        $smartVehicle1 = $_POST["smartVehicle1"];
        $smartVehicle2 = $_POST["smartVehicle2"];
        $smartVehicle3 = $_POST["smartVehicle3"];
        $smartVehicle4 = $_POST["smartVehicle4"];
        $smartVehicle5 = $_POST["smartVehicle5"];
        $iotVul1       = $_POST["iotVul1"];
        $iotVul2       = $_POST["iotVul2"];

        // Create answers array
        $answers = [];
        $answers[] = $studentID;
        $answers[] = $givenName;
        $answers[] = $familyName;
        $answers[] = $history1;
        $answers[] = $history2;
        $answers[] = $history3;
        $answers[] = $smartCity1;
        $answers[] = $smartCity2;
        $answers[] = $smartCity3;
        $answers[] = $smartVehicle1;
        $answers[] = $smartVehicle2;
        $answers[] = $smartVehicle3;
        $answers[] = $smartVehicle4;
        $answers[] = $smartVehicle5;
        $answers[] = $iotVul1;
        $answers[] = $iotVul2;

        $attempt = new Attempt($answers);
        $error = $attempt->validate();
        if(empty($error)) {
            $score = $attempt->mark();
            $query = "CREATE TABLE IF NOT EXISTS attempts ( attempt_index INT NOT NULL AUTO_INCREMENT PRIMARY KEY , attempt_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , student_id INT NOT NULL , given_name VARCHAR(100) NOT NULL , family_name VARCHAR(100) NOT NULL , attempt_no INT NOT NULL ,  score INT NOT NULL );";
            $result = mysqli_query($conn, $query); // Create table if it does not exist
            $query = "SELECT student_id, attempt_no FROM attempts WHERE student_id = $attempt->student_id;";
            $result = mysqli_query($conn, $query);
            if(!$result) {
                echo "<p>Something is wrong with ", $query, "</p>";
            } else {
                $attempts = [];
                while($row = mysqli_fetch_assoc($result)) {
                    $attempts[] = $row['attempt_no'];
                }
                if(empty($attempts)) {
                    $attempt_no = 1;
                    save($attempt, $attempt_no, $score, $conn);
                } else if(count($attempts) == 1) {
                    $attempt_no = 2;
                    save($attempt, $attempt_no, $score, $conn);
                } else {
                    echo "You have no more attempts remaining.";
                }
            }
        } else {
            echo $error;
        }
        mysqli_close($conn);
    } else {
        echo "Database could not be accessed.";
    }
} else {
    header("Location: index.php");
}

?>