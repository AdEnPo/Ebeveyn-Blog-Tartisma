<?php
session_start(); 
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

include("connection.php");
session_start();
//echo "adsdsa";
$commentId=$_GET["commentId"];

$yorumBilgisi = "update comments set status=0 where id='$commentId'";
$sonuc = mysqli_query($db,$yorumBilgisi);
echo $yorumBilgisi;
if($sonuc)
    header("Location: ../spamListeYorum.php?durum='Yorum yayına alındı'");
else
header("Location: ../spamListeYorum.php?durum='Yorum yayına alınamadı'");

?>