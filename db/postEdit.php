<?php
include("connection.php");
session_start();
$userId = $_SESSION["userId"];

$text = $_POST['text'];
$title = $_POST['title'];
$postId = $_POST['id'];
$sorgu="Update posts set text='$text', title='$title' where postId='$postId'";

$sonuc = mysqli_query($db,$sorgu);
if($sonuc)
{
    echo "Post Düzenlendi";
}
else
    echo "Post Düzenleme İşlemi Başarısız";

?>