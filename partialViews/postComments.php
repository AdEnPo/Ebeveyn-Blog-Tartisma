<?php

$comments = mysqli_query($db,"select * from comments where postId='$postId' and status!=-1");
?>
<?php 
$sayi=1;
      while($comment = mysqli_fetch_assoc($comments))
      { 
          $commentId=$comment["id"];
?>
<div class="media" style="background-color:#F2F4F4; /*background-color:#273746; color:#D4E6F1;*/ padding:10px; width:100%;">
           <?php 
            $userId = $comment["userId"];
         
           ?>
<img style="width:70px;" class="mr-3 rounded-circle img-fluid" src="userIcon.png"
        
  alt="Generic placeholder image">
            <div class="media-body">
                <div class="row">
                    <div class="col-10 col-sm-10 col-md-10"><?php 
              // Kullnıcı Adı yazılacak...
                $userId = $comment["userId"];
                $sorgu = mysqli_query($db,"select userName from users where id='$userId'")->fetch_assoc();
                echo $sorgu["userName"];
              ?></div>
                    <div class="col-2 col-sm-2 col-md-2 text-right"></div>
                </div>
              <h6 class="mt-0"></h6>
    
                <?php //Yorumun İçeriği 
                    echo $comment["text"];
                ?>
                <div class="row ml-4">
                <a class="cevaplaBtn " style="    color: #007bff; cursor:pointer" id="cevaplaBtn<?php echo $sayi; ?>">Cevapla</a><a class="ml-4" href="db/commentSpam.php<?php echo "?postId=$postId&commentId=".$comment['id']; ?>">Spam Bildir</a>
                </div>
                
              <?php 
              //yorum cevapları 
              $commentId = $comment["id"];
              $commentsReplies = mysqli_query($db,"select * from commentsreply where commentId='$commentId' and status!=-1");
              ?>
              <?php 
                while($reply = mysqli_fetch_assoc($commentsReplies))
                { 
              ?>
              <div class="media mt-3">
                    <a class="pr-3" href="#">
                    <?php 
                    $userId = $reply["userId"];
                 
                   ?>
        <img style="width:60px;" class="mr-3 rounded-circle img-fluid" src="userIcon.png"';
               
          alt="Generic placeholder image"> </a>
                    <div class="media-body">
                        <div class="row">
                              <div class="col-9 col-sm-10 col-md-10"><?php 
                     $userId = $reply["userId"];
                     $sorgu = mysqli_query($db,"select userName from users where id='$userId'")->fetch_assoc();
                     echo $sorgu["userName"];
                    ?></div>
                              <div class="col-3 col-sm-2 col-md-2 text-right"></div>
                        </div>
                    <h6 class="mt-0"></h6>
                    <?php echo $reply["text"] ?>    
                    <div class="row ml-4">
                <a class="ml-4"  href="db/commentReplySpam.php<?php echo "?postId=$postId&replyId=".$reply['id']; ?>">Spam Bildir</a>
                </div>
                </div>
                
                </div>
                <?php 
                } 
                ?>
                 <form class="replyForm" id="commentReplyForm<?php echo $sayi; ?>" action="db/newCommentReply.php" method="post" class="col-md-12 col-sm-12 mt-2" style="margin:auto;  padding:50px; padding-top:0px; padding-bottom:10px; display:none;">
             <input type="hidden" name="postId" value="<?php  echo $postBilgisi["postId"];?>">
              <input type="hidden" name="commentId" value="<?php  echo $commentId;?>">
           
            <div class="form-group">
            <input class="form-control" name="replyContent" required></input>
            </div>
            <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-send mr-1"></span> Cevapla</button>
            </div>
            </div>
        </form>
         
          </div> 
          <?php 
          $sayi++;
      } 
?>
