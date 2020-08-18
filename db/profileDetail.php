<?php
include("connection.php");
session_start();
$userName=$_GET["userName"];
$userPhotoUrl="";
$profilBilgisi = mysqli_query($db,"select * from users where userName='$userName'")->fetch_assoc();
$id=$profilBilgisi["id"];

$profilPhoto = mysqli_query($db,"select photoName from profilphotos where userId = '$id'")->fetch_assoc();
//$photo = $profilPhoto["photoName"];
if($profilPhoto["photoName"]!=null)
  $userPhotoUrl = "resim/".$profilPhoto["photoName"];

 

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