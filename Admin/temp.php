<?php
    include '../Includes/dbcon.php';
    function format($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $sql = "SELECT teamName FROM tblteam";
    $result = $conn->query($sql);
    $options =array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options[] = $row['teamName'];
        }
    }
?>
<?php
// if (isset($_POST['team'])) {
//     // Get the selected value from the dropdown
//     $teamM = $_POST['team'];   
//     echo $teamM;
// }

// if (isset($_POST['Form2'])) {
//     // Retrieve player names and jersey numbers from the form
//     echo"Hello";
//     $playerNames = $_POST["player_name"];
//     $jerseyNumbers = $_POST["jersey_number"];
    
//     // Loop through the submitted data
//     // for ($i = 0; $i < count($playerNames); $i++) {
//     //     $playerName = format($playerNames[$i]);
//     //     $jerseyNumber = format($jerseyNumbers[$i]);
        
//     //     // Perform database insertion
//     //     $query = "INSERT INTO $teamM (jerseyID, playerName) VALUES ('$jerseyNumber', '$playerName')";
//     //      $conn->query($query);
       
//     // }
//     $stmt = $conn->prepare("INSERT INTO $teamM (jerseyID, playerName) VALUES (?,?)");

//     for ($i = 0; $i < count($playerNames); $i++) {
//         $playerName = $playerNames[$i];
//         $jerseyNumber = $jerseyNumbers[$i];
               
//             // Bind parameters and execute the statement
//             $stmt->bind_param("ss", $playerName, $jerseyNumber);
//             $stmt->execute();
//     }
// }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Form</title>
    <link rel="stylesheet" href="dstyles.css">
    <script src="https://kit.fontawesome.com/082373119b.js" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="parent">

        <div class="d1">
            <div class="container">
                <ul class="list">
                    <li class="back"><a href="createTeam.php"><i 
                    class="fa-solid fa-chevron-left"></i>  Back</a></li>
                    <li><h1 class="title">Enter Details</h1></li>
                </ul>
                <!-- <form method="post" action="" id="myForm">
                    <label for="team" class="sub-title">Select Team:</label>
                    <select name="team" id="team" onchange="submitForm()" style="color: #fff;">
                        <script>
                        function submitForm() {
                            document.getElementById("myForm").submit();
                        }
                        </script>
                        <?php
                        // // Populate dropdown menu with teams
                        // foreach($options as $option){
                        //     echo "<option value='$option'>$option</option>";
                        // }
                        ?>
                    </select>
                    <br><br>
                    </form> -->
                <div class="imp">
                    <form method="POST" action="fill_form.php" id="Form2">
                        <label for="team" class="sub-title">Select Team:</label>
                        <select name="team" id="team" class="sel">
                            <b><?php
                                // Populate dropdown menu with teams
                                foreach($options as $option){
                                    echo "<option value='$option'>$option</option>";
                                }
                            ?>
                            </b>
                        </select>
                        <br><br>

                        <?php 
                            for ($i = 1; $i <= 15; $i++) { ?>
                                <table class="itab">
                                    <tr>
                                        <td><labe class="l"><b>Player <?php echo $i; ?> :  Name</b></label></td>
                                        <td><input type="text" name="player_name[]" style="margin-left: 10px;" class="inp1"></td>
                                        <td><label class="l"><b>Jersey Number</b></label></td>
                                        <td><input type="text" name="jersey_number[]" class="inp2"></td>
                                    </tr>
                                </table>
                                <!-- <label class="">Player :-Name:</label>
                                <input type="text" name="player_name[]" style="color: #fff;" class="inp1">
                                <label style="margin-left: 50px;">Jersey Number:</label>
                                <input type="text" name="jersey_number[]" style="color: #fff;" class="inp2"> -->
                                <br>
                        <?php } ?>
                        <button type="submit" class="submit">Submit</button>
                        <!-- <script>
                            function formPost(){
                                document.getElementById('Form2').submit();
                            }
                        </script> -->
                    </form>
                </div>
            </div>
        </div>
        <div class="d2">
            <img src="images/bg.png" alt="">
        </div>
    </div>
</body>
</html>
