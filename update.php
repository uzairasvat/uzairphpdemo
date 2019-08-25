<?php
session_start();
echo "<h3>Welcome".$_SESSION['user']."</h3>"; 
include "dbclass.php";
$obj=new dbclass();
$uid=$_GET['id'];
$r=$obj->findbyid($uid);
?>
<body>
<form>
<input type="hidden" name="sid" value="<?php echo $r['id'];?>">
Enter The Name:<input type="text" name="sname" value="<?php echo $r['sname']; ?>"/><br />
Enter The Address:<input type="textarea" name="address" value="<?php echo $r['saddress'];?>"/><br />
Enter The Mobile:<input type="text" name="mobile" value="<?php echo $r['smobile'];?>"/><br />
Enter The Email:<input type="email" name="email" value="<?php echo $r['semail'];?>"/><br />
Enter The Dob:<input type="date" name="dob" value="<?php echo $r['dob'];?>"/><br />
Enter The Branch:<select name="branch" <?php echo $r['sbranch']?>>
                 <option value="BCA">BCA</option>
				 <option value="MCA">MCA</option>
                 </select><br />
<input type="submit" value="submit" name="submit" />
</form>
</body>
<?php 
if(isset($_GET['submit'])){
	$r=$obj->updatestudent($_GET['sid'],$_GET['sname'],$_GET['address'],$_GET['mobile'],$_GET['email'],$_GET['dob'],$_GET['branch']);
	if($r==1){
		header('Location:view.php');
	}
	else{
		header('Location:update.php');
	}
	
}
?>