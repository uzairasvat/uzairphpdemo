<?php
session_start();
echo "<h3>Welcome".$_SESSION['user']."</h3>";
?>
<body>
<form>
Enter The Name:<input type="text" name="sname" required/><br />
Enter The Address:<input type="textarea" name="address" required/><br />
Enter The Mobile:<input type="text" name="mobile"/><br required/>
Enter The Email:<input type="email" name="email"/><br required/>
Enter The Dob:<input type="date" name="dob" required/><br />
Enter The Branch:<select name="branch" required>
                 <option value="BCA">BCA</option>
				 <option value="MCA">MCA</option>
                 </select><br />
<input type="submit" value="submit" name="submit" />
</form>
</body>
<?php
if(isset($_GET['submit'])){
	include "dbclass.php";
	$obj=new dbclass();
	$obj->insertstudent($_GET['sname'],$_GET['address'],$_GET['mobile'],$_GET['email'],$_GET['dob'],$_GET['branch']);
}
?>