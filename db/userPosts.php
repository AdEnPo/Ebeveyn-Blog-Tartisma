<?php

include("connection.php");

$userId=$_GET["user"];
if($_SESSION["userId"]==$userId)
$postlar = mysqli_query($db,"select * from posts where userId='$userId' and status!=-2 order by postId desc ");
else
$postlar = mysqli_query($db,"select * from posts where userId='$userId' and status!=-1 and status!=-2 order by postId desc ");
$userNamePostSorgu= mysqli_query($db,"select * from users where id='$userId'")->fetch_assoc();
$userNamePost = $userNamePostSorgu["userName"];
$userIdPost = $userId;
//Tüm postlar burada fetch_assoc ile alınacak döngüde..
?>