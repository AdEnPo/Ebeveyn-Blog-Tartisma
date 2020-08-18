<?php
session_start(); 
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

include("connection.php");
session_start();
//echo "adsdsa";
$commentId=$_GET["commentId"];

$yorumBilgisi = "update spamcomment set status=1 where commentId='$commentId'";
$sonuc = mysqli_query($db,$yorumBilgisi);

if($sonuc)
    header("Location: ../spamListe.php?durum='Yorum Kontrol Edildi olarak işaretlendi'");
else
header("Location: ../spamListe.php?durum='Yorum Kontrol edilenler listesine eklenemedi'");

?>