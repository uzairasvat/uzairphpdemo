<?php
session_start();
echo "<h3>Welcome".$_SESSION['user']."</h3>";
include "dbclass.php";
$obj=new dbclass();
$obj->viewstudent();
?>