<?php
include "dbclass.php";
$obj=new dbclass();
$obj->deletestudent($_GET['id']);
?>