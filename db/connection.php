
<?php
$db=mysqli_connect("localhost","root","06370637","evebeyndatabase");

if(!$db)
  {
  	echo "Hata: Veritabanına Bağlanılamadı. Lütfen tekrar deneyin";
  	exit;
  }
  if (!$db->set_charset("utf8")) {
   // printf("Error loading character set utf8: %s\n", $db->error);
    exit();
} else {
   // printf("Current character set: %s\n", $db->character_set_name());
}
?>