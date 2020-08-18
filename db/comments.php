<?php
include("connection.php");

//echo "adsdsa";
$postId=$_GET["postId"];
$comments = mysqli_query($db,"select * from comments where postId='$postId'");
?>