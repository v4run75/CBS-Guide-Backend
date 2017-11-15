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
 
 $sql = "INSERT INTO DisplayPicture (photo,uid) VALUES ('$photo', '$uid') ON DUPLICATE KEY UPDATE photo = VALUES(photo), uid = VALUES(uid)";
 
 if(mysqli_query($con,$sql)){
 file_put_contents($path,base64_decode($image));
 echo "Successfully Uploaded";
 }
 mysqli_close($con);
 }else{
 echo "Error";
 }