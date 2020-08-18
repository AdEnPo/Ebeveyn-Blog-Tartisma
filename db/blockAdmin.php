<?php
  include("connection.php");
  session_start();
  
 if($_SESSION["admin"]!="true")
  header('Location: ../index.php');

$userId = $_GET["userId"];
if($_SESSION["login"]=="true")
{
  $sorgu="update users set admin='0' where id='$userId'"; // like 1 olacak dislike =-1 olacak ...
echo $sorgu;
$sonuc = mysqli_query($db,$sorgu);

if($sonuc)
{
	if($userId == $_SESSION["userId"])
	{
		$_SESSION["admin"]="false";
		   $url = "../index.php";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
	}
    $url = "../adminListesi.php?durum=Kullanıcı adminlikten çıkartıldı";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
 }
 else{
   $url = "../adminListesi.php?durum=Kullanıcı adminlikten çıkartılamadı";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
 }  
}
else
{
     $url = "../adminListesi.php?durum=Kullanıcı adminlikten çıkartılamadı";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}
?>