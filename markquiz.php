<?php
require_once("classes/attempt.php");
require_once("settings.php");

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
            echo "<pre>";
            print_r($attempt);
            echo "</pre>";
        } else {
            echo $error;
        }
    } else {
        echo "Database could not be accessed.";
    }
} else {
    header("Location: index.php");
}

?>