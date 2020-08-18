<?php
  include("connection.php");
  session_start();
if($_SESSION["login"!=true])
   header("Location: ../index.php");
$fullName= $_POST["fullName"];
$email= $_POST["email"];
$biography= $_POST["biography"];


$userId=$_SESSION['userId'];
$sorgu="update users set fullName='$fullName', email='$email' , biography='$biography' where id = '$userId'";

$sonuc = mysqli_query($db,$sorgu);
  $userName=$_SESSION['userName'];
 $url = "../profileShow.php?userName=$userName";

if($sonuc)
{
    //echo "Profil resmi güncellendi...";
    $userName=$_SESSION['userName'];
    
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
 

}
else
  echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';









/*


  $resimVarMi = mysqli_query($db,"select photo from profilphotos where userId = '$userId'")->fetch_assoc();
  if($resimVarMi["photo"]==null)
    {
      //echo "Resim Bulunamadi";
      echo $dosya = $_FILES['resim']['resimpng12.png'];
      if(!isset($dosya))
      echo "LÜTFEN BİR RESİM SEÇİNİZ!";

      echo $resim = file_get_contents($FILES['resim']['resimpng12.png']);
      //fotoğraf yok... yeni eklenecek 
      //$sorgu="insert into posts(userId,photo) values ('$userId','$photo')";
      //$sonuc = mysqli_query($db,$sorgu);
      /*if($sonuc)
          echo "Resim Başarıyla Eklendi";
      else
          echo "Resim Eklenemedi...";
    */
   

?>