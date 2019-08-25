<?php
class dbclass{
	public $cn;
	function __construct(){
		$dsn="mysql:host=localhost;dbname=test";
		$this->cn=new PDO($dsn,"root","");
	}
	
	function reg($uname,$pwd,$mobile,$email,$dob,$address){
        $sql="insert into login(uname,pwd,mobile,email,dob,address) values(:un,:pwd,:mobile,:email,:dob,:address)";
        $stmt=$this->cn->prepare($sql);
        $stmt->bindParam(':un',$uname);
        $stmt->bindParam(':pwd',$pwd);
        $stmt->bindParam(':mobile',$mobile);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':dob',$dob);
        $stmt->bindParam(':address',$address);
        $stmt->execute();
        $row=$stmt->rowCount();
		if($row==1){
		 header("Location:index.php");
		}
		else{
		 header("Location:reg.php");	
		}		
	}
	
    function login($unm, $upass) {
        $query = "select * from login where uname=:un and pwd=:up";
        $stmt = $this->cn->prepare($query);
        $stmt->bindParam(":un", $unm);
        $stmt->bindParam(":up", $upass);
        $stmt->execute();
		$row=$stmt->rowCount();
		return $row;	
    }
	function insertstudent($sname,$saddress,$smobile,$semail,$sdob,$sbranch){
		$sql="insert into student (sname,saddress,smobile,semail,dob,sbranch) value(:sn,:saddress,:smobile,:semail,:sdob,:sbranch)";
        $stmt=$this->cn->prepare($sql);
        $stmt->bindParam(':sn',$sname);
        $stmt->bindParam(':saddress',$saddress);
        $stmt->bindParam(':smobile',$smobile);
        $stmt->bindParam(':semail',$semail);
        $stmt->bindParam(':sdob',$sdob);
        $stmt->bindParam(':sbranch',$sbranch);
        $stmt->execute();
        $row=$stmt->rowCount();
        if($row == 1){
           header('Location:view.php');
		}
		else{
		   header('Location:insert.php');
		}
		
	}
	
	function viewstudent(){
		$sql="select * from student";
		$stmt=$this->cn->prepare($sql);
		$stmt->execute();
		echo '<table border=01>';
		echo '<tr><th>Sname</th><th>Saddress</th><th>Smobile</th><th>Semail</th><th>Sdob</th><th>Sbranch</th><th>ACtion</th><th>ACtion</th></tr>';
		while($row=$stmt->fetch()){
		 echo '<tr>';
		 echo "<td>$row[sname]</td>";
		 echo "<td>$row[saddress]</td>";
		 echo "<td>$row[smobile]</td>";
		 echo "<td>$row[semail]</td>";
		 echo "<td>$row[dob]</td>";
		 echo "<td>$row[sbranch]</td>";
		 echo "<td><a href=update.php?id=$row[id]>Update</a></td>";
		 echo "<td><a href=delete.php?id=$row[id]>Delete</a></td>";
		 echo '</tr>';
		}
		echo '</table>';
	}
	
	function deletestudent($id){
		$sql="delete from student where id=:id";
		$stmt=$this->cn->prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$row=$stmt->rowCount();
		if($row == 1){
			header('Location:view.php');
		}		
	}
	
	function findbyid($id){
		$sql="select * from student where id=:id";
		$stmt=$this->cn->prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$r=$stmt->fetch();
		$res=array('id'=>$r['id'],'sname'=>$r['sname'],'saddress'=>$r['saddress'],'smobile'=>$r['smobile'],'semail'=>$r['semail'],'dob'=>$r['dob'],'sbranch'=>$r['sbranch']);
		return $res;
	}
	
	function updatestudent($id,$sname,$saddress,$smobile,$semail,$sdob,$sbranch){
		$sql="update Student set sname=:sname,saddress=:saddress,smobile=:smobile,semail=:semail,dob=:sdob,sbranch=:sbranch where id=:id";
		$stmt=$this->cn->prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->bindParam(':sname',$sname);
        $stmt->bindParam(':saddress',$saddress);
        $stmt->bindParam(':smobile',$smobile);
        $stmt->bindParam(':semail',$semail);
        $stmt->bindParam(':sdob',$sdob);
        $stmt->bindParam(':sbranch',$sbranch);
        $stmt->execute();
		return 1;
	}
}
?>