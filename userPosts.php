<?php 
	define("TITLE", "Home | Web Project");
  include ("includes/header.php"); 
  session_start();
  include("db/userPosts.php");
  /*Takip Kontrol*/
  $userId = $_SESSION["userId"];
  $userNameProfil = $_SESSION["userName"];
  $takipKontrol= mysqli_query($db,"select * from followers where userId='$userId' and followerId='$userIdPost'")->fetch_assoc();
  $takipDurum=false;
  if($takipKontrol!=null)
	  if($takipKontrol["status"]==1)
		  $takipDurum=true;
	  
  ?>

<?php 
	include ("includes/header.php"); 
?>
<div class="container-fluid" >  

<a class="btn btn-light" id="menuControl" data-toggle="modal" data-target="#exampleModalCenter"  style="z-index:1; top:5px;"><span class="fas fa-bars fa-2x"></span></a>
<div class="row mt-4">  
    <div class="col-md-3" id="userMenu">
  
    <div class="row" id="">
   
    </div>
    <?php /**/ 
/*    include("partialViews/menu.php");
*/
 ?>
      <div class="list-group mt-4">
        
         <button type="button" class="list-group-item list-group-item-action" id="homePage">Ana Sayfa</button>
         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="userPosts">Postlarım</button>

         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="changePassword" >Şifre Değiştir</button>

         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="hesapBilgilerim">Hesap Ayarlarım</button>
         <button type="button" class="list-group-item list-group-item-action <?php if($_SESSION['login']!=true) echo 'disabled'; ?>" id="signOut">Çıkış</button>

       </div>
        </div>
       
        <div class="col-md-7" id="posts" style="padding:20px; padding-top:0px; padding-right:50px;">
	
			 
					<div class="col-md-12 text-center" style="padding:10px;">
						
						<?php 
						if($userId != $userIdPost){
						if($takipDurum)
						echo "<p scope='col'><a href='db/follow.php?id=$userIdPost&status=0' class='btn btn-danger btn-sm'>"."$userNamePost'i Takibi Bırak</a></p>";
						else
						echo "<p scope='col'><a href='db/follow.php?id=$userIdPost&status=1' class='btn btn-primary btn-sm'>"."$userNamePost'i Takip Et</a></p>";
						}
						else
						echo "<p scope='col'><a href='profileShow.php?userName=$userNameProfil' class='btn btn-info btn-sm'>Profil Düzenle</a></p>";
						
						?>
					</div>
		
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
        { ?>
            <div style="padding:15px; margin-top:20px;  padding-top:0px; background-color:#D5DBDB">
            <div class="row" style="padding:10px; background-color:#34495E; color:white;"><div class="col-md-6 text-left">Tarih: <?php echo $sonuc["datetime"]; ?></div><div class="col-md-6 text-right"><a href=""><span class="fa fa-user"></span><?php echo $userNamePost; ?></a></div></div>
                <div class="row" style="background-color:#ECF0F1;">
                    <p style=" text-align:center; margin-left:auto; margin-right:auto;line-height:70px; font-size:20px; margin-bottom:0px;"><?php if($sonuc["status"]==-1) echo "<span class='text-danger'>Bu post admin tarafından yayından kaldırılmıştır!</span>"; echo $sonuc["title"]; ?></p>
                </div>
                <div class="row" style="padding:20px; text-align:justify">
                      <?php echo $sonuc["text"]; ?>
                </div>
                <div class="col-md-12 text-center">
                  <a href="postDetail.php?postId=<?php echo $sonuc["postId"]; ?>" class="btn btn-primary btn-sm">Detaylı Göster</a>
                <?php 
			
				if($_SESSION["userId"]==$sonuc["userId"]) 
                 echo '<a href="db/postDelete.php?postId='.$sonuc["postId"].'" class="btn btn-danger btn-sm">Postu Sil</a>';
                  ?>
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