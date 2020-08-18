<?php 
	define("TITLE", "Home | Web Project");
  include ("includes/header.php"); 
  session_start();
  include("db/postDetail.php");
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Evbeveyn Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
  </div>
</nav>
<?php 
	include ("includes/header.php"); 
?>
<div class="container-fluid" >  
<a class="btn btn-light" id="menuControl" data-toggle="modal" data-target="#exampleModalCenter"  style="z-index:1;"><span class="fas fa-bars fa-2x"></span></a>
<div class="row mt-4">  
    <div class="col-md-3" id="userMenu">
  
    <div class="row mt-4" id="">
   
    </div>
    <?php /**/ 
  /*  include("partialViews/menu.php");
 */
 
 ?>
  <div class="list-group">
        
         <button type="button" class="list-group-item list-group-item-action " id="homePage">Ana Sayfa</button>
         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="userPosts">Postlarım</button>
       
         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="changePassword">Şifre Değiştir</button>
       
         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="hesapBilgilerim">Hesap Ayarlarım</button>
         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="signOut">Çıkış</button>

       </div>
        </div>
       
        <div class="col-md-7" id="posts" style=" padding-top:0px;">
		<div class="col-md-12 text-center" id="postEdit" style="display:none">
        		
		<div class="row mt-4" style="margin:auto;">
        <input class="form-control col-md-8 mb-4 offset-md-2" id="postTitle" type="text" placeholder="Title" value='<?php echo $postBilgisi["title"]; ?>'>
          <div id="editor" style="margin:auto;">
              <div id='edit'>
					  <?php echo $postBilgisi["text"]; ?>       
              </div>
            </div>
          </div>
          <div class="row mt-3 mb-4">
            <button id="btnPostEdit" style="margin:auto;" class="btn btn-warning">Düzenle</button>
          </div>
          </div>
        <div class="col-md-12 text-center" >
        <?php if($postBilgisi["status"]==-1) echo "<span class='text-danger'>Bu post admin tarafından yayından kaldırılmıştır!</span>";?>
        <?php if($_GET["durum"]!=null && $_GET["durum"]!="")
              echo '<div class="alert alert-info" role="alert">'.$_GET["durum"].'</div>';
              ?>
        
      
     
            

        </div>

		  
        <div class="col-md-12 text-center" >
        <img style="width:100px; border:2px solid #34495E; "<?php if($userPhotoUrl ==null)
             echo 'src="userIcon.png"';  
             else
             echo 'src="'.$userPhotoUrl.'"';
             ?> 
             
             style="width:100px; " class="rounded-circle img-fluid  " alt="...">
           
        </div>
            <div style="padding:15px; margin-top:5px;  padding-top:0px; background-color:#D5DBDB">
            <?php
              $userId=$postBilgisi["userId"];
              $user=mysqli_query($db,"select * from users where id='$userId'")->fetch_assoc();
              $userName=$user["userName"];
              ?>
            <div class="row" style="padding:10px; background-color:#34495E; color:white;"><div class="col-md-6 text-left">Tarih: <?php echo $postBilgisi["datetime"]; ?></div><div class="col-md-6 text-right"><a href="userPosts.php?user=<?php echo $userId ?>"><span class="fa fa-user mr-1"></span><?php echo $userName; ?></a> </div></div>
                <div class="row" style="background-color:#ECF0F1;">
                    <p style=" text-align:center; margin-left:auto; margin-right:auto;line-height:70px; font-size:20px; margin-bottom:0px;"><?php echo $postBilgisi["title"]; ?></p>
                </div>
                <div class="row" style="padding:20px; text-align:justify">
                      <?php echo $postBilgisi["text"]; ?>
                </div>
                <div class="row" style="padding:0px 20px;  text-align:justify">
                <div class="col-md-6">
                     <a class="mr-2" href="db/postLike.php?like=1&postId=<?php echo $postBilgisi["postId"]; ?>" style="color:#2E4053; cursor:pointer;" id="like"><span class="fas fa-thumbs-up mr-2" style="
                     <?php if($userLikeDurum["status"]==null) 
                     echo "color:#2E4053;"; 
                  else if($userLikeDurum["status"]=="1")
                     echo "color:#3498DB;";
                      ?>"></span><?php echo $likeNumber; ?></a>
                      





                      <a class="ml-2" href="db/postLike.php?like=-1&postId=<?php echo $postBilgisi["postId"]; ?>" style="color:#2E4053; cursor:pointer;" id="dislike"><span class="fas fa-thumbs-down mr-2"  style=" <?php if($userLikeDurum["status"]==null) 
                     echo "color:#2E4053;"; 
                  else if($userLikeDurum["status"]=="-1")
                     echo "color:#3498DB;";
                      ?>"></span><?php echo $dislikeNumber; ?></a>
                      </div>
                
                      <div class="col-md-6 text-right">
                
                      <button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-dark btn-sm ml-2">Spam Bildir</button>
                      <?php if($postBilgisi["userId"]==$_SESSION["userId"])
					  {
						echo '<button class="btn btn-warning btn-sm ml-2" id="postDuzenleBtn">Postu Düzenle</button>';  
					  }						  ?>
					  </div>
                </div>
            </div>
            
            <div class="row mt-0" style="padding:15px;" id="comments">
            <?php 
              include("partialViews/postComments.php");
            ?>
            </div>

            <form action="db/newComment.php" method="post" class="col-md-12 col-sm-12" style="margin:auto;  padding:50px; padding-top:0px; padding-bottom:10px;">
            <input type="hidden" name="postId" value="<?php  echo $postBilgisi["postId"];?>">
            <div class="form-group">

            <textarea class="form-control" name="commentContent" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-success"> Yorum Yap</button>
            </div>
          </form>
           
        </div>
        

  

 
    <div class="col-md-2" style="background-color:gray;">
    </div>
        </div>
</div>


<!--Spam post için modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <form action="db/postSpam.php" method="post" class="col-md-12 col-sm-12" style="margin:auto;  padding:50px; padding-bottom:10px;">
     <p class="text-center"> <?php echo "<span style='color:darkred;'>".$postUserName."</span> kişisini spamlamak üzeresiniz!" ?></p>
            <input type="hidden" name="postId" value="<?php  echo $postBilgisi["postId"];?>">
            <div class="form-group">
            <label for="commentContent" style="font-weight:bold">Lütfen Şikayetinizi Belirtiniz</label>
            <textarea class="form-control" name="spamDescription" rows="3"></textarea>
            </div>
            <div class="col-md-12 text-right">
            <button  type="submit" class="btn btn-danger"><span class=""></span> Spamla</button>
            </div>
          </form>
    </div>
  </div>
</div>






<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
    
    </div>
     <?php /**/ 
     /*include("partialViews/menu.php");*/
            
     
     
      ?>
       <div class="list-group">
         
         <button type="button" class="list-group-item list-group-item-action" id="homePageModal">Ana Sayfa</button>
         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="userPostsModal">Postlarım</button>

         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="changePasswordModal">Şifre Değiştir</button>

         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="hesapBilgilerimModal">Hesap Ayarlarım</button>
         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="signOutModal">Çıkış</button>

       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     <!--   <button type="button" class="btn btn-primary">Save changes</button>-->
      
      </div>
    </div>
  </div>
</div>


    
<script type="text/javascript" src="node_modules/froala-editor/js/froala_editor.pkgd.min.js"></script>

  <script>
    (function () {
      new FroalaEditor("#edit")
    })()
  </script>
 


<?php  include ("includes/footer.php"); ?>


<script>

 $(document).ready(function(){
          
            $("#btnPostEdit").click(function(){
          console.log("click");
        $.ajax({
            type: "POST",
            url: 'db/PostEdit.php',
            data: {text: $("div.fr-box.fr-basic .fr-element").html(),title: $("#postTitle").val(),id:<?php echo $_GET["postId"]; ?>},
            success: function(data){
            alert(data);
            },
            error: function(){
            alert('error!');
                }
            });
            $("div.fr-box.fr-basic .fr-element").text("");
            $("#postTitle").val("");
			$("#postEdit").css("display","none");
			window.location = "postDetail.php?postId=<?php echo $_GET['postId'];?>";
      });
	  
	  $("#postDuzenleBtn").click(function (){
			$("#postEdit").css("display","block");
	  });
	  
      });
          

/*
var menuControlBtn = 0;
$("#menuControl").click(function(){
    if(menuControlBtn%2==0){
      if($(window).width > 768)
$("#userMenu").hide(300);
//$("#posts").removeClass("col-md-7");
//$("#posts").addClass("col-md-10");
    }
    else
    {
  //      $("#posts").removeClass("col-md-10");
  //      $("#posts").addClass("col-md-7");
        $("#userMenu").show(300);
    }
    menuControlBtn++;

//alert("");
    });
*/
    $(".cevaplaBtn").click(function(){
            var btnId = $(this).attr("id");
            var num = btnId.substring(10);
            $(".replyForm").css("display","none");
            $("#commentReplyForm"+num+"").css("display","block");
    });

    /* Modal Menu CLİCK*/
          /*  Menu Click  Scripts */ 
        $("#userPostsModal").click(function(){
          window.location = "userPosts.php?user="+"<?php echo $_SESSION['userId']?>";
        });
        $("#homePageModal").click(function(){
          window.location = "index.php";
        });
        $("#changePasswordModal").click(function(){
          window.location = "sifreDegistir.php";
        });
        
        $("#signOutModal").click(function(){
          window.location = "db/signOut.php";
        });
        $("#hesapBilgilerimModal").click(function(){
          window.location = "profileShow.php?userName=<?php echo $_SESSION['userName']; ?>";
        });

      /*  Menu Click  Scripts */ 
        $("#userPosts").click(function(){
          window.location = "userPosts.php?user="+"<?php echo $_SESSION['userId']?>";
        });
        $("#homePage").click(function(){
          window.location = "index.php";
        });
        $("#changePassword").click(function(){
          window.location = "sifreDegistir.php";
        });
        
        $("#signOut").click(function(){
          window.location = "db/signOut.php";
        });
        $("#hesapBilgilerim").click(function(){
          window.location = "profileShow.php?userName=<?php echo $_SESSION['userName']; ?>";
        });



/*
$("#menuControl").click(function(){
    if(menuControlBtn%2==0){
$("#userMenu").hide();
$("#posts").removeClass("col-md-7");
$("#posts").addClass("col-md-10");
    }
    else
    {
        $("#posts").removeClass("col-md-10");
        $("#posts").addClass("col-md-7");
        $("#userMenu").show(300);
    }
    menuControlBtn++;
//alert("");
    });
*/
</script>