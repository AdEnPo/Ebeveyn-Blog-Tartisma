<?php
  include("connection.php");
  session_start();
if($_SESSION["login"!=true])
   header("Location: ../index.php");
$oncekiParola= $_POST["oncekiParola"];
$yeniParola= $_POST["yeniParola"];
$yeniParolaTekrar= $_POST["yeniParolaTekrar"];

echo $oncekiParola;
echo $yeniParola;
echo $yeniParolaTekrar;
if($_SESSION["password"]==$oncekiParola)
{
$userId=$_SESSION['userId'];
$sorgu="update users set pass='$yeniParola' where id = '$userId'";
echo $sorgu;
$sonuc = mysqli_query($db,$sorgu);
if($sonuc)
    header("Location: ../sifreDegistir.php?durum=Parola Değiştirildi");
else
header("Location: ../sifreDegistir.php?durum=Parola Değiştirilemedi");
}
else{
    header("Location: ../sifreDegistir.php?durum=Mevcut parolanız doğru değil");
}









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