<body>
<form>
Enter The Username:<input type="text" name="uname" /><br/>
Enter The Password:<input type="password" name="pwd" /><br/>
Enter The Mobile:<input type="mobile" name="mobile" /><br/>
Enter The Email:<input type="email" name="email" /><br/>
Select DOB:<input type="date" name="dob" /><br/>
Enter The Address:<input type="textarea" name="address" /><br/>
<input type="submit" name="submit" value="Submit" />
<input type="reset" />
</form>
</body>
<?php
if(isset($_GET['submit'])){
include "dbclass.php";
$obj=new dbclass();
$obj->reg($_GET['uname'],$_GET['pwd'],$_GET['mobile'],$_GET['email'],$_GET['dob'],$_GET['address']);	
}
?>