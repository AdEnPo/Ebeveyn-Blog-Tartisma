<?php
include("connection.php");
session_start();

 if($_SESSION["admin"]!="true")
  header('Location: ../index.php');

$userId=$_GET["userId"];
$adminList = mysqli_query($db,"select * from users where admin=1");


 

//$dizin = opendir("resim"); //listelenecek dizin

//$userPhotoUrl = "";
/*
while (($dosya = readdir($dizin)) !== false)
    if(! is_dir($dosya)){ 
      $dosyaParca=explode(".", $dosya);
     
      if($dosyaParca[0]==$_SESSION["userName"]){
        $userPhotoUrl="resim/$dosya";
       // echo $userPhotoUrl;
      } 
    } 

closedir($dizin);
*/




?>