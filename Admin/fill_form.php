<?php
include '../Includes/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Retrieve player names and jersey numbers from the form
    echo '<script type ="text/JavaScript">';  
     echo 'alert("Team sucessfully created please go back")';  
    echo '</script>'; 
    echo"TEAMS ";
    $teamM = $_POST['team'];
    $playerNames = $_POST["player_name"];
    $jerseyNumbers = $_POST["jersey_number"];
    
    // Loop through the submitted data
    // for ($i = 0; $i < count($playerNames); $i++) {
    //     $playerName = format($playerNames[$i]);
    //     $jerseyNumber = format($jerseyNumbers[$i]);
        
    //     // Perform database insertion
    //     $query = "INSERT INTO $teamM (jerseyID, playerName) VALUES ('$jerseyNumber', '$playerName')";
    //      $conn->query($query);
       
    // }
    $stmt = $conn->prepare("INSERT INTO $teamM (playerName, jerseyID) VALUES (?,?)");

    for ($i = 0; $i < count($playerNames); $i++) {
        $playerName = $playerNames[$i];
        $jerseyNumber = $jerseyNumbers[$i];
               
            // Bind parameters and execute the statement
            $stmt->bind_param("ss", $playerName, $jerseyNumber);
            $stmt->execute();
    }
}
$url = "createTeam.php"; // Replace with the desired URL

header("Location: $url");
exit();
?>
