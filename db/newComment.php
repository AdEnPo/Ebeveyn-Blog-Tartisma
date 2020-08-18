<?php
session_start();
include("connection.php");
$postId = $_POST["postId"];
$content = $_POST["commentContent"];
$userId = $_SESSION["userId"];

if($_SESSION["login"]=="true")
{

$sorgu="insert into comments(userId,text,postId) values ('$userId','$content','$postId')";
$sonuc = mysqli_query($db,$sorgu);
if($sonuc)
{
          $url = "../postDetail.php?postId=$postId"."&durum='basarili'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
    

    
}
else{
      $url = "../postDetail.php?postId=$postId"."&durum='hataOlustu'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}


}
else{
      $url = "../postDetail.php?postId=$postId"."&durum=Yorum yapabilmek için lütfen giriş yapınız!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}

?>