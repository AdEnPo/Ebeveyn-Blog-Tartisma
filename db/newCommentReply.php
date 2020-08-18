<?php
session_start();
include("connection.php");
$postId = $_POST["postId"];
$commentId = $_POST["commentId"];
$content = $_POST["replyContent"];
$userId = $_SESSION["userId"];
echo $postId;

if($_SESSION["login"]=="true")
{

$sorgu="insert into commentsreply(userId,text,commentId) values ('$userId','$content','$commentId')";
echo $sorgu;
$sonuc = mysqli_query($db,$sorgu);
if($sonuc)
{  
    $url = "../postDetail.php?postId=$postId"."&durum='Yorum yaptınız'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
    
   
    
}
else{
      $url = "../postDetail.php?postId=$postId"."&durum='Yorumunuz yayınlanamadı'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}
}
else{
      $url = "../postDetail.php?postId=$postId"."&durum=Yorum yapabilmek için lütfen giriş yapınız!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}
?>