<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $image = $_POST['image'];
                $email = $_POST['email'];
 
 require_once('kronosDB.php');

 $path = "uploads/$email.png";
 
 $found=0;

 $actualpath = "http://sscbskronos.esy.es/$path";
 
 $sql = "SELECT uid from DisplayPicture";

 $res=mysqli_query($con,$sql);

 while($row=mysqli_fetch_array($res))
 {
 	if($email==$row[1]){
 		$found=1;
		if(file_exists($email.png))
 			file_put_contents($path,base64_decode($image));
 			echo "Successfully Updated";
 	}
 	if($found==1)
	break;
 }
 
 if($found==0){
 $sql = "INSERT INTO DisplayPicture (photo,uid) VALUES ('$actualpath','$email')";
 
 if(mysqli_query($con,$sql)){
 file_put_contents($path,base64_decode($image));
 echo "Successfully Uploaded";
 	}
 
 }
 mysqli_close($con);
 }else{
 echo "Error";
 }