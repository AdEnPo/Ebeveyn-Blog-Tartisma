<?php
  include("connection.php");
   session_start();
 if($_SESSION["admin"]!="true")
  header('Location: ../index.php');
$userName = $_POST["userName"];

  $userIdSorgu=mysqli_query($db,"select * from users where userName='$userName'")->fetch_assoc();
  if($userIdSorgu["id"]!=null)
  {
  $userId = $userIdSorgu["id"];
    if($userIdSorgu["admin"]!="1"){
  $sorgu="update users set admin='1' where id='$userId'"; // like 1 olacak dislike =-1 olacak ...
//echo $sorgu;
$sonuc = mysqli_query($db,$sorgu);
if($sonuc){
  $url = "../adminPaneli.php?durum=Kullanıcıya adminlik verildi";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
     }
else{
  $url = "../adminPaneli.php?durum=Kullanıcıya adminlik verilemedi";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
    
}
        
    }
    else
    {
        //kullanıcı zaten admin
          $url = "../adminPaneli.php?durum=Kullanıcı zaten admin";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
    }
}
  else{
        $url = "../adminPaneli.php?durum=Kullanıcı bulunamadı";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
  }
  


?>