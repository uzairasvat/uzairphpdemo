<?php 
/*
	function isEven($no){
		$isEven = true;
		$i=0;
		for($i=1;$i<=$no;$i++){
			$isEven=!$isEven;
		}
		return $isEven;
	}
	 $no=102;
	 if(isEven($no)){
		 echo "even";
	 }else{
		 echo "odd";
	 }
*/
?>


<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="image" id="image">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>