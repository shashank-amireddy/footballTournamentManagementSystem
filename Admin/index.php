<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welcome.css">
    <title>Welcome</title>
</head>
<body>
    
    <div class="container">
        <div class="header">
            <ul>
                <li><img src="images/pngegg-2.png" alt="logo"></li>
                <li><p style="font-size: 23px; font-weight:800; margin-top:15px;">Football Tournament Management System</p></li>
            </ul>
        </div>

        <video autoplay loop muted plays-inline class="background-clip">
            <source src="images/background3 - HD 720p.mp4" type="video/mp4">
        </video>

        <div class="content">
            <h1>Welcome, <span>Let's play</span></h1>
            <ul>
                <li><a href="createTeam.php">CREATE TEAMS</a></li>
                <li><a href="select_teams.php">START MATCH</a></li>
            </ul>
            
        </div>
    </div>

</body>
</html>