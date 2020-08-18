<?php
include("connection.php");
session_start();
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

$userId=$_GET["userId"];
$spamPostList = mysqli_query($db,"select * from spampost");
$spamCommentList = mysqli_query($db,"select *from spamcomment");
$spamCommentReplyList = mysqli_query($db,"select *from spamcommentreply");


 

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