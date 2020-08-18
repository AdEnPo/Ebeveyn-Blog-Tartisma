<?php
session_start(); 
include("connection.php");
session_start();

$userName=$_POST["SignInUserName"];
$password=$_POST["SignInPassword"];
$profilBilgisi = mysqli_query($db,"select * from users where userName='$userName'")->fetch_assoc();
$profilPhoto = mysqli_query($db,"select photoName from profilphotos where userId=(select id from users where userName='$userName')")->fetch_assoc();
if($profilPhoto["photoName"]!=null)
$userPhotoUrl = "resim/".$profilPhoto["photoName"];
if($profilBilgisi["pass"]==null){
    
    $url = " ../login.php?durum=Böyle bir kullanıcı yok!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
 
}
else
{
  if($profilBilgisi["pass"] == $password){
	  if($profilBilgisi["status"]==-2)
	  {  $url = "../login.php?durum=Erişim yetkiniz bulunmamaktadır";
			echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
	  }else{
    //cookie işlemleri yapılacak...
    //ya da session
 
    
    $_SESSION["login"] = "true";
    $_SESSION["userName"] = $userName;
    $_SESSION["password"] =  $profilBilgisi["pass"];
    $_SESSION["userId"] = $profilBilgisi["id"];
    $_SESSION["photo"]=$userPhotoUrl;
    if($profilBilgisi["admin"]==1)
    $_SESSION["admin"]="true";
    else
    $_SESSION["admin"]="false";
    $url = "../index.php";
echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
	  }   
  }
  else{
      $url = "../login.php?durum=Kullanıcı Adınız ya da Şifreniz Yanlış";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
  }
}

?>