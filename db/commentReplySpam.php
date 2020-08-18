<?php
  include("connection.php");
  session_start();

  if($_SESSION["login"]!="true")
  header("Location: ../login.php");
$postId = $_GET["postId"];
$replyId = $_GET["replyId"];
$userId=$_SESSION['userId'];

$spamVarmi=mysqli_query($db,"select * from spamcommentreply where userId='$userId' and replyId='$replyId'")->fetch_assoc();
//kullanici daha önce spamlamıs mı 
if($spamVarmi!=null){
      $url = "../postDetail.php?postId=$postId&durum=Bu yorumu zaten spamladınız.";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}

//  $sorgu="update likes set status='$postLike' where userId='$userId' and postId='$postId'"; // like 1 olacak dislike =-1 olacak ...
else{
$sorgu="insert into spamcommentreply(userId,replyId) values ('$userId','$replyId')";
echo $sorgu;
$sonuc = mysqli_query($db,$sorgu);
if($sonuc){
      $url = "../postDetail.php?postId=$postId&durum=Bu yorumu spamladınız.";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}
else{
      $url = "../postDetail.php?postId=$postId&durum=Spamlama işlemi başarısız.";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}





}

?>