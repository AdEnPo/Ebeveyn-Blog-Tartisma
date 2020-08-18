<?php
include("connection.php");
session_start();

$postId=$_GET["postId"];
$userId=$_SESSION["userId"];
$sorgu="Update posts set status=-2 where postId='$postId'";
$sorgu=mysqli_query($db,$sorgu);
if($sorgu){
          $url = "../userPosts.php?user=$userId&durum='Post silindi'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}

else{
          $url = "../userPosts.php?user=$userId&durum='Post silinemedi'";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}



?>