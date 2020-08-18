<?php
include("connection.php");

$userName=$_GET["userName"];
$postId=2;
$post = mysqli_query($db,"select * from posts where postId='$postId'")->fetch_assoc();

if($post)
  echo "Başarılı";
else
  echo "Başarısız";


?>