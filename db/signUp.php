<?php
include("connection.php");
$email=$_POST["SignUpEmail"];
$userName=$_POST["SignUpUserName"];
$password=$_POST["SignUpPassword"];
$passwordAgain=$_POST["SignUpPasswordAgain"];
if($password!=$passwordAgain)
{
      $url = "../login.php?durum=Şifreler Uyuşmuyor!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';

}
else{
$profilBilgisi = mysqli_query($db,"select * from users where userName='$userName'")->fetch_assoc();

if($profilBilgisi["pass"]==null)
 {
    $sorgu = "insert into users(userName,email,pass) values ('$userName','$email','$password')";
 $sonuc = mysqli_query($db,$sorgu);
   
    if($sonuc)
    {
          $url = "../login.php?durum=Merhaba $userName Bloğunuza Hoşgeldiniz!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
      
    }
 } 
else
{ 
  //Kullanıcı zaten var...
   $url = "../login.php?durum=$userName kullanıcı adı zaten var!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';

}
}
?>