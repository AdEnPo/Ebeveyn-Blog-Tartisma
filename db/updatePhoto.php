<?php
  include("connection.php");
  session_start();
  if(isset($_POST["resimyukle"]))
  {
    echo "evet";
    $yukleklasor = "../resim/"; // yuklenecek klasör;;
    $tmp_name = $_FILES['yukle_resim']['tmp_name'];
    $name = $_FILES['yukle_resim']['name'];
    $boyut = $_FILES['yukle_resim']['size'];
    $tip = $_FILES['yukle_resim']['type'];
    $uzanti = substr($name,-4,4);
   // $rastgeleaSayi1 = rand(10000,50000);
   // $rastgeleaSayi2 = rand(10000,50000);
    $resimAd = $_SESSION["userName"].$uzanti;
     //dosyaVarmi kontrol
 if(strlen($name)==0)
 {
	 echo "bir dosya seciniz!";
	 exit();
 }
 if($boyut>(1024*1024*3)){
	 echo "dosya boyutu çok fazla";
	 exit();
 }
move_uploaded_file($tmp_name,"$yukleklasor/$resimAd");
}
else
{
    echo "hayir";
}
/*   Profil resminin uzantısını kaydetme...   */ 
$userId=$_SESSION['userId'];
$photoVarMi=mysqli_query($db,"select * from profilphotos where userId='$userId'")->fetch_assoc();
if($photoVarMi!=null)
  $sorgu="update profilphotos set photoName='$resimAd' where userId = '$userId'";

else
$sorgu="insert into profilphotos(userId,photoName) values ('$userId','$resimAd')";
$_SESSION["photo"]="resim/".$resimAd;
echo $sorgu;
$sonuc = mysqli_query($db,$sorgu);
if($sonuc)
{
    //echo "Profil resmi güncellendi...";
    $userName=$_SESSION['userName'];
        $url = "../profileShow.php?userName=$userName";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
    

}
else
    echo "Eklenemedi...";










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