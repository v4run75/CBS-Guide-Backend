<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $image = $_POST['image'];
                $email = $_POST['email'];
 
 require_once('kronosDB.php');

 $path = "uploads/$email.png";
 
 $actualpath = "http://sscbskronos.esy.es/$path";
 
 $sql = "INSERT INTO DisplayPicture (photo,uid) VALUES ('$actualpath','$email')";
 
 if(mysqli_query($con,$sql)){
 file_put_contents($path,base64_decode($image));
 echo "Successfully Uploaded";
 }
 
 mysqli_close($con);
 }else{
 echo "Error";
 }