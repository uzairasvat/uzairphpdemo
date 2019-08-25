<?php session_start(); 
      $s=$_SESSION['user']; 
?><h3>Welcome!<?php echo $s;?></h3>
<h3><a href="insert.php">Add</a></h3>
<h3><a href="view.php">View</a></h3>
