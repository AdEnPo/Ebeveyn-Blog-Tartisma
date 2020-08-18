<?php
session_start(); 
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

include("connection.php");
session_start();
//echo "adsdsa";
$replyId=$_GET["replyId"];

$yorumBilgisi = "update commentsreply set status=0 where id='$replyId'";
$sonuc = mysqli_query($db,$yorumBilgisi);
echo $yorumBilgisi;
if($sonuc)
    header("Location: ../spamListeCevap.php?durum='Yorum yayına alındı'");
else
header("Location: ../spamListeCevap.php?durum='Yorum yayına alınamadı'");

?>