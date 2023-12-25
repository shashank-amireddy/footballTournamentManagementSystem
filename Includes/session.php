
<?php
session_start(); 

if (!isset($_SESSION['userId']))
{
  echo "<script type = \"text/javascript\">
  window.location = (\"../Admin/createTeam.php\");
  </script>";

}

    
?>