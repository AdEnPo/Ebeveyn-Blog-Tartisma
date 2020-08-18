<?php
session_start(); 
include("connection.php");
session_start();
//echo "adsdsa";
$postId=$_GET["postId"];

$postBilgisi = mysqli_query($db,"select * from posts where postId='$postId'")->fetch_assoc();
$userId=$postBilgisi['userId'];
//echo $postBilgisi["text"];
$profilPhoto = mysqli_query($db,"select photoName from profilphotos where userId='$userId'")->fetch_assoc();
$postUserNameSorgu= mysqli_query($db,"select userName from users where id='$userId'")->fetch_assoc();
$postUserName=$postUserNameSorgu["userName"];
if($profilPhoto["photoName"]!=null)
$userPhotoUrl = "resim/".$profilPhoto["photoName"];
//echo $userPhotoUrl;
$userId = $_SESSION["userId"];

$userLikeDurum = mysqli_query($db,"select * from likes where postId='$postId' and userId='$userId'")->fetch_assoc();

$likeNumberSorgu = mysqli_query($db,"SELECT COUNT(*) FROM likes WHERE postId=$postId and status=1")->fetch_assoc();
$likeNumber = $likeNumberSorgu["COUNT(*)"];

$dislikeNumberSorgu = mysqli_query($db,"SELECT COUNT(*) FROM likes WHERE postId=$postId and status=-1")->fetch_assoc();
$dislikeNumber = $dislikeNumberSorgu["COUNT(*)"];

?>