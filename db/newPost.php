<?php
include("connection.php");
session_start();
$userId = $_SESSION["userId"];

$text = $_POST['text'];
$title = $_POST['title'];
$photo = $_POST['productPhoto'];
echo $text;
$sorgu="insert into posts(userId,text,title) values ('$userId','$text','$title','$photo')";
echo $sorgu;
$sonuc = mysqli_query($db,$sorgu);
if($sonuc)
{
    echo "Post OLUŞTURULDU";
}
else
    echo "Oluştutulamadı";
//echo $sorgu;
// sorguyu çalıştırıyoruz
/*
$sonuc= mysqli_query($db,$sorgu);
// sorgunun çalışıp çalışmadığını kontrol ediyoruz
if ($sonuc)
 	{
  echo mysqli_affected_rows($db);
  echo(" adet kaydınız başarı ile eklenmiştir.......<br>");
   }
   else{
   echo "hata var";
   echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";

   }
   
echo ('<a href = "index.htm">Ana sayfaya dönmek için tıklayınız.<a>');
*/
?>