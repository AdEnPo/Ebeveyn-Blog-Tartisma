<?php
session_start(); 
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

include("connection.php");
session_start();
//echo "adsdsa";
$replyId=$_GET["replyId"];

$yorumBilgisi = "update spamcommentreply set status=1 where replyId='$replyId'";
$sonuc = mysqli_query($db,$yorumBilgisi);

if($sonuc)
    header("Location: ../spamListe.php?durum='Yorum Kontrol Edildi olarak işaretlendi'");
else
header("Location: ../spamListe.php?durum='Yorum Kontrol edilenler listesine eklenemedi'");

?>