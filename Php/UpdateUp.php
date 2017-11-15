<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $image = $_POST['image'];
 $uid = $_POST['uid'];
 
 require_once('kronosDB.php');
 
 $found=0;
 
 $sql ="SELECT uid FROM DisplayPicture ORDER BY uid ASC";
 
 $res = mysqli_query($con,$sql);
 
 $path = "uploads/$uid.png";
 
 $actualpath = "http://sscbskronos.esy.es/$path";
 
 while($row=mysql_fetch_array($res))
 {
  if($uid==$row[0]){
    	$found=1;
	$sql = "UPDATE DisplayPicture SET photo='$actualpath' WHERE uid='$uid'";
	if(mysqli_query($con,$sql)){
 		file_put_contents($path,base64_decode($image));
		}
	if($found==1)
	break;
		}
 }

 if($found==0)
	{
 		$sql = "INSERT INTO DisplayPicture (photo,uid) VALUES ('$actualpath','$uid')";
 		if(mysqli_query($con,$sql)){
 		file_put_contents($path,base64_decode($image));
		}
	}
 
 
 mysqli_close($con);
 }else{
 echo "Error";
 }