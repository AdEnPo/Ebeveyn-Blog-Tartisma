<?php
session_start(); 
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

include("connection.php");
session_start();
//echo "adsdsa";
$postId=$_GET["postId"];

$postBilgisi = "update spamPost set status=1 where postId='$postId'";
$sonuc = mysqli_query($db,$postBilgisi);

if($sonuc)
    header("Location: ../spamListe.php?durum='Post Kontrol Edildi olarak işaretlendi'");
else
header("Location: ../spamListe.php?durum='Post Kontrol edilenler listesine eklenemedi'");

?>