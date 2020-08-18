<?php
  include("connection.php");
  session_start();
 if($_SESSION["admin"]!="true")
  header('Location: index.php');

$userId = $_GET["userId"];
if($_SESSION["login"]=="true")
{
  $sorgu="update users set status='0' where id='$userId'"; // -2 engelleme...
echo $sorgu;
$sonuc = mysqli_query($db,$sorgu);
if($sonuc)

    $url = "../users.php?durum=Kullanıcı engelli kaldırıldı.";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
 
    
}
else
{
     $url = "../users.php?durum=Kullanıcı engeli kaldırılamadı!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}
?>