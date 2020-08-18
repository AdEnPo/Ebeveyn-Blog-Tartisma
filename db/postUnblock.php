<?php
session_start(); 
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

include("connection.php");
session_start();
//echo "adsdsa";
$postId=$_GET["postId"];

$postBilgisi = "update posts set status=0 where postId='$postId'";
$sonuc = mysqli_query($db,$postBilgisi);
echo $postBilgisi;
if($sonuc){
      $url = "../spamListePost.php?durum='Post yayına alındı'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}
else{
      $url = "../spamListePost.php?durum='Post yayına alınamadı'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}

?>