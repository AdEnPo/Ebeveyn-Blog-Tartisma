<?php
  include("connection.php");
  session_start();
  if($_SESSION["login"]!="true")
  header("Location: ../login.php");
  
$postId = $_POST["postId"];
$description = $_POST["spamDescription"]; 
$userId=$_SESSION['userId'];
$spamVarmi=mysqli_query($db,"select * from spampost where userId='$userId' and postId='$postId'")->fetch_assoc();
//kullanici daha önce spamlamıs mı 
if($spamVarmi!=null){
        $url = "../postDetail.php?postId=$postId&durum=Bu postu zaten spamladınız!";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
}


//  $sorgu="update likes set status='$postLike' where userId='$userId' and postId='$postId'"; // like 1 olacak dislike =-1 olacak ...
else{
$sorgu="insert into spampost(userId,postId,description) values ('$userId','$postId','$description')";
//echo $sorgu;
$sonuc = mysqli_query($db,$sorgu);
if($sonuc){
      $url = "../postDetail.php?postId=$postId&durum=Bu postu spamladınız.";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
}

else{
    $url = "../postDetail.php?postId=$postId&durum=Spamlama işlemi başarısız.";
   echo ' <meta http-equiv="refresh" content="0;URL='.$url.'"'.'>';
   
}


}

?>