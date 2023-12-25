<?php
include '../Includes/dbcon.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="wstyles.css">
        <script src="https://kit.fontawesome.com/082373119b.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="welcome">
            <div class="header">
                
            </div>
            <div class="container">
                
                <video autoplay loop muted plays-inline class="bvideo"><source src="images/background122 - HD 1080p.mov" type="video/mp4"></video>
                <h1 class="sub-title">Winner</h1>
                <p id="sub-title" class="sub-title"></p>
            </div>
        </div>
    </body>
    <script>
    var queryParameters = new URLSearchParams(window.location.search);
    var receivedVariable = queryParameters.get('variable');

    // Use the received variable in the destination webpage
    console.log(receivedVariable);
    
        document.getElementById("sub-title").innerHTML=receivedVariable;    
    
    </script>
</html>