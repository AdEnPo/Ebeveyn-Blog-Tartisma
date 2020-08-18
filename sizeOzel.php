<?php 
	define("TITLE", "Home | Web Project");
  include ("includes/header.php"); 
  session_start();
 if($_SESSION["login"]!="true")
  header('Location: index.php');
  include("db/userPosts.php");
  /*Takip Kontrol*/
  $userId = $_SESSION["userId"];
  $userNameProfil = $_SESSION["userName"];
   $postlar = mysqli_query($db,"SELECT * FROM posts INNER JOIN followers ON posts.userId=followers.followerId where followers.userId=$userId and followers.status!=0 Order by postId DESC Limit 1,10");
    
  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">EbevynBlog</a>
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
  
    <div class="row" id="">
    <div class="col-md-12 text-center" style="padding:10px;">
  
    </div> 
    </div>
    <?php /**/ 
/*    include("partialViews/menu.php");
*/
 ?>
      <div class="list-group">
        
         <button type="button" class="list-group-item list-group-item-action" id="homePage">Ana Sayfa</button>
         <button type="button" class="list-group-item list-group-item-action" id="userPosts">Postlarım</button>
 
         <button type="button" class="list-group-item list-group-item-action" id="changePassword">Şifre Değiştir</button>

         <button type="button" class="list-group-item list-group-item-action" id="hesapBilgilerim">Hesap Ayarlarım</button>
         <button type="button" class="list-group-item list-group-item-action" id="signOut">Çıkış</button>

       </div>
        </div>
       
        <div class="col-md-7" id="posts" style="padding:20px; padding-top:0px; padding-right:50px;">
		
        <?php
      
        if($_GET["durum"]!="" || $_GET["durum"]!=null)
        {
        echo '<div class="alert alert-primary text-center" role="alert">';
          echo $_GET['durum'];
        echo '</div>';
        }
        ?>
        <?php
        while($sonuc = mysqli_fetch_assoc($postlar))
	    { 
	
	?>
	<?php 

	$postId= $sonuc["postId"];
				$userNameSorgu= mysqli_query($db,"Select * from users where id=(Select userId from posts where postId=$postId)")->fetch_assoc();
			$userName=$userNameSorgu["userName"];
	?>
            <div style="padding:15px; margin-top:20px;  padding-top:0px; background-color:#D5DBDB">
            <div class="row" style="padding:10px; background-color:#34495E; color:white;"><div class="col-md-6 text-left">Tarih: <?php echo $sonuc["datetime"]; ?></div><div class="col-md-6 text-right"><a href="userPosts.php?user=<?php 
            $userId = $userNameSorgu['id'];
            echo $userId ?>"><span class="fa fa-user"></span><?php echo $userName; ?></a></div></div>
                <div class="row" style="background-color:#ECF0F1;">
                    <p style=" text-align:center; margin-left:auto; margin-right:auto;line-height:70px; font-size:20px; margin-bottom:0px;"><?php if($sonuc["status"]==-1) echo "<span class='text-danger'>Bu post admin tarafından yayından kaldırılmıştır!</span>"; echo $sonuc["title"]; ?></p>
                </div>
                <div class="row" style="padding:20px; text-align:justify">
                      <?php echo $sonuc["text"]; ?>
                </div>
                <div class="col-md-12 text-center">
                  <a href="postDetail.php?postId=<?php echo $sonuc["postId"]; ?>" class="btn btn-primary btn-sm">Detaylı Göster</a>
               
                </div>
            </div>
            
            <?php }
        ?> 

<div class="fa-3x text-center mt-4">
 
  <i class="fas fa-spinner fa-pulse"></i>
  
</div>
        <p class="text-center"> Yükleniyor ... </p>
     
    </div>
 
    <div class="col-md-2" style="background-color:gray;">
            
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
         <div class="list-group">
         
         <button type="button" class="list-group-item list-group-item-action" id="homePageModal">Ana Sayfa</button>
         <button type="button" class="list-group-item list-group-item-action" id="userPostsModal">Postlarım</button>
       
         <button type="button" class="list-group-item list-group-item-action" id="changePasswordModal">Şifre Değiştir</button>
      
         <button type="button" class="list-group-item list-group-item-action" id="hesapBilgilerimModal">Hesap Ayarlarım</button>
         <button type="button" class="list-group-item list-group-item-action" id="signOutModal">Çıkış</button>

       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     <!--   <button type="button" class="btn btn-primary">Save changes</button>-->
      
      </div>
    </div>
  </div>
</div>


<?php  include ("includes/footer.php"); ?>


<script>
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
          window.location = "userPosts.php?user="+"<?php echo $_SESSION['userId'];?>";
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