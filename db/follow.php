<?php
  include("connection.php");
  session_start();
$postId = $_GET["postId"];
$postLike = $_GET["like"];
echo $postLike;
echo $postId; 
if($_SESSION["login"]=="true")
{

$userId=$_SESSION['userId'];
$followerId = $_GET["id"];
$status = $_GET["status"];

$takipDurum=mysqli_query($db,"select * from followers where userId='$userId' and followerId='$followerId'")->fetch_assoc();

if($takipDurum!=null)
{
	$sorgu="update followers set status='$status' where userId='$userId' and followerId='$followerId'"; // like 1 olacak dislike =-1 olacak ...
}
else{
  if($status==1)
	$sorgu="insert into followers(userId,followerId) values ('$userId','$followerId')";
  else 
  {
	  $url = "../userPosts.php?user=$followerId&durum=Hata Oluştu!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
  }
}
$sonuc = mysqli_query($db,$sorgu);
   if($sonuc){
   $url = "../userPosts.php?user=$followerId";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   }
   else
   {
	      $url = "../userPosts.php?user=$followerId&durum=Hata Oluştu!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
   }
}

else
{
   $url = "../userPosts.php?user=$followerId&durum=Takip edebilmeniz için giriş yapmalısınız!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}


?>