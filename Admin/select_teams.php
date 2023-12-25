<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="s_styles.css">
</head>
<body>
    <div>
        <h1 class="title">MATCH</h1>
        
        <div>
            <div id="times" align="center">
                <div id="timer">90:00</div>
                <button class="tb" style="position: relative; z-index: 10;" ondblclick="start()"> start</button>
                <button class="tb" style="position: relative; z-index: 10;" id="stop-button">Stop Timer</button>
                <script src="timer.js"></script>
            </div>        
        </div>
        
        <?php
            include '../Includes/dbcon.php';
            // Fetch team names
            $sql = "SELECT * FROM tblteam";
            $result = $conn->query($sql);
            $options =array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $options[] = $row['teamName'];
                }
            }

            $jsArray = json_encode($options);

            mysqli_close($conn);
        ?>

                <!-- <div class='score'>
                 <p style='color: #ffff00;' id='nm1'>team1</p>
                <p id='s1'>0</p>
                <p>-</p>
                <p id='s2'>0</p>
                <p id='nm2' style='color: #d12d36;'>team1</p>
                </div> -->
        <form method="POST" action="" id="Form1">
            <label for="team1" class="sub-title">Select Team1:</label>
            <select name="team1" id="team1" class="sel" onchange="updateTeam2()">
            </select>
            <label for="team2" class="sub-title">Select Team2:</label>
            <select name="team2" id="team2" class="sel" onchange="">
            <option>Select</option>
            </select>                
                <button  class="submit" onclick="updateTeamss()">Submit</button>
            
                
                <script>
                    var jsArray = <?php echo $jsArray; ?>;

                    function team1Dropdown() {
                        var dropdown = document.getElementById("team1");

                        // Clear existing options
                        dropdown.innerHTML = "";

                        // Create and add options based on the array values
                        for (var i = 0; i < jsArray.length; i++) {
                            var option = document.createElement("option");
                            option.text = jsArray[i];
                            option.value = jsArray[i];
                            dropdown.add(option);
                        }
                    }


                    team1Dropdown();
                    function updateTeam2(){
                        var dropdown1 = document.getElementById("team1");
                        var dropdown = document.getElementById("team2");

                        // Clear existing options
                        dropdown.innerHTML = "";

                        // Create and add options based on the array values
                        for (var i = 0; i < jsArray.length; i++) {
                            if(dropdown1.value == jsArray[i]){
                                continue;
                            }
                            var option = document.createElement("option");
                            option.text = jsArray[i];
                            option.value = jsArray[i];
                            dropdown.add(option);
                        }
                    }
                    function updateTeamss(){
                        console.log(2);
                        var dropdown1 = document.getElementById("team1");
                        var dropdown2 = document.getElementById("team2");
                        
                        document.getElementById("nm1").innerHTML=dropdown1.value;
                        document.getElementById("nm2").innerHTML=dropdown2.value;
                    }

                </script>
                
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $teamm1 = $_POST['team1'];$teamm2 = $_POST['team2'];
                        echo "
                        <br>
                        <br>
                        <br><div class='score'>
                            <p style='color: #ffff00;' id='nm1'>".$teamm1."</p>
                            <p id='s1'>0</p>
                            <p>-</p>
                            <p id='s2'>0</p>
                            <p id='nm2' style='color: #d12d36;'>".$teamm2."</p>
                            </div>";
                        // $query = "INSERT INTO winners (teamn) VALUES ($)";
                        // $conn->query($query);
                    }

                ?>
                
        </form>

        
    <br>
    
        <div id="main">
            
            <div id="php1">
            
                <?php
                    include '../Includes/dbcon.php';
                    
                    error_reporting(0);
                        
                    $query = "SELECT * FROM $teamm1";
                    $rs = $conn->query($query);
                    $num = $rs->num_rows;
                    $class='player';
                    if($num > 0)                            
                    {
                        echo"<p class='n1'>Name</p>";
                        while ($rows = $rs->fetch_assoc())
                        {
                            echo"<div class='row-class' >
                                ".$rows['playerName']."
                                </div>";
                        }
                    }
                    else
                    {
                        echo   
                        "No Record Found!";
                    }                            
                ?>
                            
                       
       
        </div>
        
        <div id="tt1">
        <div class="pp">
            <div class="p1"><p>Goals</p></div>
            <div class="p2"><p>Yellow Cards</p></div>
            <div class="p3"><p>Red Cards</p></div>
        </div>
        <table class="t1">
            
        <tr id="t11">
            <td ><button id="goal1" onclick="decrement1(this.id)" class="goal0">-</button><p   id="tg11"></p><button class="goal1" id="goal1" onclick="increase1(this.id)">+</button></td>
            <td ><button id="yellow1" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty11"></p><button class="yellow1" id="yellow1" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red1" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr11"></p><button class="red1" id="red1" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t12">
            <td ><button id="goal2" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg12"></p><button id="goal2" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow2" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty12"></p><button class="yellow1" id="yellow2" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red2" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr12"></p><button class="red1" id="red2" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t13">
            <td ><button id="goal3" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg13"></p><button id="goal3" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow3" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty13"></p><button class="yellow1" id="yellow3" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red3" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr13"></p><button class="red1" id="red3" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t14">
            <td ><button id="goal4" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg14"></p><button id="goal4" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow4" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty14"></p><button class="yellow1" id="yellow4" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red4" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr14"></p><button class="red1" id="red4" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t15">
            <td ><button id="goal5" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg15"></p><button id="goal5" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow5" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty15"></p><button class="yellow1" id="yellow5" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red5" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr15"></p><button class="red1" id="red5" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t16">
            <td ><button id="goal6" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg16"></p><button id="goal6" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow6" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty16"></p><button class="yellow1" id="yellow6" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red6" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr16"></p><button class="red1" id="red6" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t17">
            <td ><button id="goal7" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg17"></p><button id="goal7" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow7" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty17"></p><button class="yellow1" id="yellow7" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red7" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr17"></p><button class="red1" id="red7" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t18">
            <td ><button id="goal8" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg18"></p><button id="goal8" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow8" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty18"></p><button class="yellow1" id="yellow8" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red8" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr18"></p><button class="red1" id="red8" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t19">
            <td ><button id="goal9" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg19"></p><button id="goal9" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow9" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty19"></p><button class="yellow1" id="yellow9" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red9" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr19"></p><button class="red1" id="red9" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t110">
            <td ><button id="goal10" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg110"></p><button id="goal10" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow10" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty110"></p><button class="yellow1" id="yellow10" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red10" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr110"></p><button class="red1" id="red10" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t111">
            <td ><button id="goal11" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg111"></p><button id="goal11" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow11" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty111"></p><button class="yellow1" id="yellow11" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red11" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr111"></p><button class="red1" id="red11" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t112">
            <td ><button id="goal12" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg112"></p><button id="goal12" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow12" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty112"></p><button class="yellow1" id="yellow12" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red12" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr112"></p><button class="red1" id="red12" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t113">
            <td ><button id="goal13" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg113"></p><button id="goal13" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow13" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty113"></p><button class="yellow1" id="yellow13" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red13" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr113"></p><button class="red1" id="red13" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t114">
            <td ><button id="goal14" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg114"></p><button id="goal14" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow14" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty114"></p><button class="yellow1" id="yellow14" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red14" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr114"></p><button class="red1" id="red14" onclick="increase1(this.id)">+</button></td>
        </tr>
        <tr id="t115">
            <td ><button id="goal15" onclick="decrement1(this.id)" class="goal0">-</button><p  id="tg115"></p><button id="goal15" onclick="increase1(this.id)" class="goal1">+</button></td>
            <td ><button id="yellow15" onclick="decrement1(this.id)" class="yellow0">-</button><p  id="ty115"></p><button class="yellow1" id="yellow15" onclick="increase1(this.id)">+</button></td>
            <td ><button id="red15" onclick="decrement1(this.id)" class="red0">-</button><p  id="tr115"></p><button class="red1" id="red15" onclick="increase1(this.id)">+</button></td>
        </tr>

        </table>
    </div>

    

    <div id="php2">
        <p class="n1">Name</p>
        <table>
            <?php
                include '../Includes/dbcon.php';
                error_reporting(0);
                $query = "SELECT * FROM $teamm2";
                $rs = $conn->query($query);
                $num = $rs->num_rows;
                if($num > 0)
                { 
                  while ($rows = $rs->fetch_assoc())
                  {
                      echo"<div class='row-class' >
                      ".$rows['playerName']."
                   </div>";
                  }
                }
                else
                {
                  echo   
                    "No Record Found!";
                }
                      
            ?>
        </table>
    </div>
    <div id="tt2">
    <div class="pp">
        <div class="p1"><p>Goals</p></div>
        <div class="p2"><p>Yellow Cards</p></div>
        <div class="p3"><p>Red Cards</p></div>
    </div>
        <table class="t1">
            <tr id="t21">
                <td ><button id="goal21" onclick="decrement2(this.id)" class="goal0">-</button><p id="tg21"></p><button class="goal1" id="goal21" onclick="increase2(this.id)">+</button></td>
                <td ><button id="yellow21" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty21"></p><button class="yellow1" id="yellow21" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red21" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr21"></p><button class="red1" id="red21" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t22">
                <td ><button id="goal22" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg22"></p><button id="goal22" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow22" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty22"></p><button class="yellow1" id="yellow22" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red22" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr22"></p><button class="red1" id="red22" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t23">
                <td ><button id="goal23" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg23"></p><button id="goal23" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow23" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty23"></p><button class="yellow1" id="yellow23" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red23" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr23"></p><button class="red1" id="red23" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t24">
                <td ><button id="goal24" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg24"></p><button id="goal24" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow24" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty24"></p><button class="yellow1" id="yellow24" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red24" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr24"></p><button class="red1" id="red24" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t25">
                <td ><button id="goal25" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg25"></p><button id="goal25" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow25" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty25"></p><button class="yellow1" id="yello25" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red25" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr25"></p><button class="red1" id="red25" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t26">
                <td ><button id="goal26" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg26"></p><button id="goal26" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow26" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty26"></p><button class="yellow1" id="yellow26" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red26" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr26"></p><button class="red1" id="red26" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t27">
                <td ><button id="goal27" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg27"></p><button id="goal27" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow27" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty27"></p><button class="yellow1" id="yellow27" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red27" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr27"></p><button class="red1" id="red27" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t28">
                <td ><button id="goal28" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg28"></p><button id="goal28" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow28" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty28"></p><button class="yellow1" id="yellow28" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red28" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr28"></p><button class="red1" id="red28" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t29">
                <td ><button id="goal29" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg29"></p><button id="goal29" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow29" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty29"></p><button class="yellow1" id="yellow29" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red29" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr29"></p><button class="red1" id="red29" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t210">
                <td ><button id="goal210" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg210"></p><button id="goal210" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow210" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty210"></p><button class="yellow1" id="yellow210" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red210" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr210"></p><button class="red1" id="red210" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t211">
                <td ><button id="goal211" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg211"></p><button id="goal211" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow211" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty211"></p><button class="yellow1" id="yellow211" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red211" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr211"></p><button class="red1" id="red211" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t212">
                <td ><button id="goal212" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg212"></p><button id="goal212" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow212" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty212"></p><button class="yellow1" id="yellow212" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red212" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr212"></p><button class="red1" id="red212" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t213">
                <td ><button id="goal213" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg213"></p><button id="goal213" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow213" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty213"></p><button class="yellow1" id="yellow213" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red213" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr213"></p><button class="red1" id="red213" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t214">
                <td ><button id="goal214" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg214"></p><button id="goal214" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow214" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty214"></p><button class="yellow1" id="yellow214" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red214" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr214"></p><button class="red1" id="red214" onclick="increase2(this.id)">+</button></td>
            </tr>
            <tr id="t215">
                <td ><button id="goal215" onclick="decrement2(this.id)" class="goal0">-</button><p  id="tg215"></p><button id="goal215" onclick="increase2(this.id)" class="goal1">+</button></td>
                <td ><button id="yellow215" onclick="decrement2(this.id)" class="yellow0">-</button><p  id="ty215"></p><button class="yellow1" id="yellow215" onclick="increase2(this.id)">+</button></td>
                <td ><button id="red215" onclick="decrement2(this.id)" class="red0">-</button><p  id="tr215"></p><button class="red1" id="red215" onclick="increase2(this.id)">+</button></td>
            </tr>
    
            </table>
    </div>
    <div id="Es" align="center">
        <button class="Esubmit" onclick="doThat()" >End Match</button>
        <p id="final"></p>
    </div>
    </div>
   







<script>
     var s1=0,s2=0;
    var team1=[],team2=[];
    for(var i=1;i<=15;i++){
        team1[i]=[];
        team2[i]=[];
        for(var j=1; j<=3;j++){
            team1[i][j]=0;
            team2[i][j]=0;
        }
    }
    for(var i=1;i<=15;i++){
        for(var j=1;j<=3;j++){ 
            document.getElementById(`tg1${i}`).innerHTML=team1[i][j];
            document.getElementById(`ty1${i}`).innerHTML=team1[i][j];
            document.getElementById(`tr1${i}`).innerHTML=team1[i][j];
        }
    }
    for(var i=1;i<=15;i++){
        for(var j=1;j<=3;j++){ 
            document.getElementById(`tg2${i}`).innerHTML=team2[i][j];
            document.getElementById(`ty2${i}`).innerHTML=team2[i][j];
            document.getElementById(`tr2${i}`).innerHTML=team2[i][j];
        }
    }

    function increase1(id){
        const element = document.getElementById(id);
        var column=element.parentElement.cellIndex;
        var row=element.parentElement.parentElement.rowIndex;
        // const row = element.parentElement.rowIndex;
        // const column = element.cellIndex;
        // console.log(row);
        // console.log(column);
        team1[row+1][column+1]=team1[row+1][column+1]+1;
        if(column==0){
            row++;
            document.getElementById(`tg1${row}`).innerHTML=team1[row][column+1];
            s1++;
            document.getElementById("s1").innerHTML=s1;
        }
        else if(column==1){
            row++;
            document.getElementById(`ty1${row}`).innerHTML=team1[row][column+1];
        }
        else{
            row++;
            document.getElementById(`tr1${row}`).innerHTML=team1[row][column+1];
        }   
    }

    function decrement1(id){
        const element = document.getElementById(id);
        var column=element.parentElement.cellIndex;
        var row=element.parentElement.parentElement.rowIndex;
        // const row = element.parentElement.rowIndex;
        // const column = element.cellIndex;
        // console.log(row);
        // console.log(column);
        if(team1[row+1][column+1]!=0)
        team1[row+1][column+1]=team1[row+1][column+1]-1;
        if(column==0){
            row++;
            document.getElementById(`tg1${row}`).innerHTML=team1[row][column+1];
            if(s1!=0)
            s1--;
            document.getElementById("s1").innerHTML=s1;
        }
        else if(column==1){
            row++;
            document.getElementById(`ty1${row}`).innerHTML=team1[row][column+1];
        }
        else{
            row++;
            document.getElementById(`tr1${row}`).innerHTML=team1[row][column+1];
        }
    
    }

    function increase2(id){
        const element = document.getElementById(id);
        var column=element.parentElement.cellIndex;
        var row=element.parentElement.parentElement.rowIndex;
        // const row = element.parentElement.rowIndex;
        // const column = element.cellIndex;
        // console.log(row);
        // console.log(column);
        team2[row+1][column+1]=team2[row+1][column+1]+1;
        if(column==0){
            row++;
            document.getElementById(`tg2${row}`).innerHTML=team2[row][column+1];
            s2++;
            document.getElementById("s2").innerHTML=s2;
        }
        else if(column==1){
            row++;
            document.getElementById(`ty2${row}`).innerHTML=team2[row][column+1];
        }
        else{
            row++;
            document.getElementById(`tr2${row}`).innerHTML=team2[row][column+1];
        }
    
    }

    function decrement2(id){
        const element = document.getElementById(id);
        var column=element.parentElement.cellIndex;
        var row=element.parentElement.parentElement.rowIndex;
    
        // const row = element.parentElement.rowIndex;
        // const column = element.cellIndex;
        // console.log(row);
        // console.log(column);
        if(team2[row+1][column+1]!=0)
        team2[row+1][column+1]=team2[row+1][column+1]-1;    
        console.log(team2[row+1][column+1]);
        if(column==0){
            row++;
            document.getElementById(`tg2${row}`).innerHTML=team2[row][column+1];
            console.log(column);
            console.log(row);
            if(s2!=0)
            s2--;
            document.getElementById("s2").innerHTML=s2;
        }
        else if(column==1){
            row++;
            document.getElementById(`ty2${row}`).innerHTML=team2[row][column+1];
        }
        else{
            row++;
            document.getElementById(`tr2${row}`).innerHTML=team2[row][column+1];
        }
    }

    function doThat(){
        if(s1>s2)
        var phpVariable = "<?php echo $teamm1; ?>";
        else if(s2>s1)
        var phpVariable = "<?php echo $teamm2; ?>";
        else if(s1==s2)
        var phpVariable = "Tie";
        var destinationURL = "http://localhost:3000/Admin/winner.php?variable=" + encodeURIComponent(phpVariable);
        window.location.href = destinationURL;

    }

</script>

    <?php
        $conn->close();
    ?>
        </div>
    </div>
</div>


<body>
    
</body>
</html>
