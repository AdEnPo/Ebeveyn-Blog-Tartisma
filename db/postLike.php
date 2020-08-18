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
$likeDislikeVarmi=mysqli_query($db,"select * from likes where userId='$userId' and postId='$postId'")->fetch_assoc();
if($likeDislikeVarmi!=null)
  $sorgu="update likes set status='$postLike' where userId='$userId' and postId='$postId'"; // like 1 olacak dislike =-1 olacak ...
else
$sorgu="insert into likes(userId,postId,status) values ('$userId','$postId','$postLike')";

$sonuc = mysqli_query($db,$sorgu);
    $url = "../postDetail.php?postId=$postId";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   

}
else
{
        $url = "../postDetail.php?postId=$postId&durum=Begeni yapabilmeniz için giriş yapmalısınız!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}


?>