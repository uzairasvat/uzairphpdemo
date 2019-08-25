<?php
session_start();
?>
<body>
<form method="GET">
Enter The UserName:<input type="text" name="uname" title="PLZ Enter The UserName"required /><br/>
Enter The Password:<input type="password" name="pwd" title="PLZ Enter The Password" required /><br/>
<input type="submit" name="submit" value="Login" /><br/>
</form>
<a href="reg.php">Create User</a>
</body>
<?php
if(isset($_GET['submit']))
{
	if($_GET['uname']=="admin" && $_GET['pwd']=="admin")
	{
		header("Location:oddeven.php");
	}
	else{
        include "dbclass.php";
        $obj=new dbclass();
        $r=$obj->login($_GET['uname'],$_GET['pwd']);	
        if($r == 1)
		{
	       $_SESSION['user'] = $_GET['uname'];
		   header("Location:home.php");
		}
		else
		{
		   header("Location:index.php");	
		}
	}
}	
?>