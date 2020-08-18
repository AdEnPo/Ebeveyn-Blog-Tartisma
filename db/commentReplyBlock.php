<?php
session_start(); 
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

include("connection.php");
session_start();
//echo "adsdsa";
$replyId=$_GET["replyId"];

$yorumBilgisi = "update commentsreply set status=-1 where id='$replyId'";
$sonuc = mysqli_query($db,$yorumBilgisi);

if($sonuc)
    header("Location: ../spamListeCevap.php?durum='Yorum Yayından Kaldırıldı'");
else
header("Location: ../spamListeCevap.php?durum='Yorum Yayından Kaldırılamadı'");

?>