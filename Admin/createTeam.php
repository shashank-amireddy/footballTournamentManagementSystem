
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
// include '../Includes/session.php';
?>


<?php
if(isset($_POST['save'])){//------------------------SAVE--------------------------------------------------
  $teamName=$_POST['teamName'];
  $query=mysqli_query($conn,"select * from tblteam where teamName ='$teamName'");
  $ret=mysqli_fetch_array($query);
  if($ret > 0){ 
    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>
                  This team Already Exists!</div>";
  }
  else{
    $query=mysqli_query($conn,"insert into tblteam(teamName) value('$teamName')");
    if ($query){
      $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>
      Created Successfully!</div>";
    }
    else{
      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>
                    An error Occurred!</div>";
    }
  }
}
if(isset($_POST['save'])){
  $teamName=$_POST['teamName'];
  $query2= "CREATE TABLE $teamName (
  jerseyId INT(6) PRIMARY KEY ,
  playerName VARCHAR(30) NOT NULL ) ";
  $conn->query($query2);
}
//---------------------------------------EDIT-------------------------------------------------------------






//--------------------EDIT------------------------------------------------------------
if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit"){
  $Id= $_GET['Id'];
  $query=mysqli_query($conn,"select * from tblteam where Id ='$Id'");
  $row=mysqli_fetch_array($query);
  if(isset($_POST['update'])){//------------UPDATE-----------------------------
    $teamName=$_POST['teamName'];
    $query=mysqli_query($conn,"update tblteam set teamName='$teamName' where Id='$Id'");
    if ($query) {
      echo "<script type = \"text/javascript\">`
            window.location = (\"createTeam.php\")
            </script>"; 
    }
    else{
      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>
                    An error Occurred!</div>";
    }
  }
}


//--------------------------------DELETE------------------------------------------------------------------
if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete"){
  $Id= $_GET['Id'];
  $query = mysqli_query($conn,"DELETE FROM tblteam WHERE Id='$Id'");
  if ($query == TRUE) {
    echo "<script type = \"text/javascript\">
          window.location = (\"createTeam.php\")
          </script>";  
  }
  else{
    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>
                  An error Occurred!</div>"; 
  }   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, 
  shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="tstylecs.css">
  <script src="https://kit.fontawesome.com/082373119b.js" crossorigin="anonymous">
  </script>
</head>

<body id="page-top">
<div id="parent">
  <div id="d1">
  <div class="container">
  <ul class="list">
    <li class="back"><a href="index.php"><i class="fa-solid fa-chevron-left">
    </i> Back</a></li>
    <li><p class="title">Create Teams</p></li>
  </ul>
  <form method="post">
    <ul class="team_name">
      <li><p>Team Name : </p></li>
      <li class="input"><input type="text" name="teamName" value="<?php 
        echo $row['teamName'];?>" id="exampleInputFirstName" placeholder="Team Name">
      </li>
    </ul>
    <div class="card">
      <?php echo $statusMsg; ?>
    </div>
    <?php
      if (isset($Id)){
    ?>
    <button type="submit" name="update" class="submit">Done</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
      } else {           
    ?>
    <button type="submit" name="save" class="submit">Save</button>
    <?php
      }         
    ?>
  </form>
  <p class="sub-title">All Teams</p>             
  <table style="margin-bottom: 10px" id="dataTableHover">
    <thead>
      <tr>
        <th>#</th>
        <th>Team Name</th>
        <th></th>
        <th></th>
      </tr>
    </thead>              
    <tbody>
      <?php
        $query = "SELECT * FROM tblteam";
        $rs = $conn->query($query);
        $num = $rs->num_rows;
        $sn=0;
        if($num > 0){ 
          while ($rows = $rs->fetch_assoc()){
            $sn = $sn + 1;
            echo"
              <tr>
              <td>".$sn."</td>
              <td>".$rows['teamName']."</td>
              <td><a href='?action=edit&Id=".$rows['Id']."'>
              <i class='fas fa-fw fa-edit'></i>Edit</a></td>
              <td><a href='?action=delete&Id=".$rows['Id']."'>
              <i class='fas fa-fw fa-trash'></i>Delete</a></td>
              </tr>";
          }
        }
        else{
          echo  
            "<div class='alert alert-danger' role='alert'>
            No Record Found!
            </div>";
        }              
      ?>
    </tbody>
  </table>
  <?php
    if (isset($_POST['buttonClicked'])) {
    // Code to execute when the button is clicked
    
          echo "<script type = \"text/javascript\">
  window.location = (\"../Admin/temp.php\");
  </script>";
    }
  ?>     
  
  <form method="post" action="">
    <button class="submit" type="submit" name="buttonClicked" >Fill Details</button>
  </form>
  
  
  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</div>
</div>
<div id="d2">
  <img src="images/bg1.png" style="width: 100%;">
</div>
</div>
</body>
</html>