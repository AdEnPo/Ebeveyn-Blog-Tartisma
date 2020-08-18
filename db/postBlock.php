<?php
session_start(); 
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

include("connection.php");
session_start();
//echo "adsdsa";
$postId=$_GET["postId"];

$postBilgisi = "update posts set status=-1 where postId='$postId'";
$sonuc = mysqli_query($db,$postBilgisi);

if($sonuc)
   {
         $url = "../spamListePost.php?durum='Post Yayından Kaldırıldı'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
   } 
else{
      $url = "../spamListePost.php?durum='Post Yayından Kaldırılamadı'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}


?>