
<?php
 include ("db/profileDetail.php"); 
 session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link href="node_modules/froala-editor/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="node_modules/froala-editor/css/froala_style.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ebeveyn</title>
  <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/styles.css">
  <link href="content/progressBar.scss" rel="stylesheet/scss" type="text/css"></link>
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
  <link rel="stylesheet" href="style.css">



  <style>
 @media (max-width: 768px) {
      .ulList {
        margin-right: -15px;
        margin-bottom: 50px;
      }
      .col-md-7 {
        padding: 0px;
      }
      .col-md-6 {
        padding: 0px;
      }
      #userMenu{
          display:none;
      }
    
    }
    #menuControl{
          left:10px;
      }
      
    div#editor {
      width: 81%;
      margin: auto;
      text-align: left;
    }

    .ss {
      background-color: red;
    }
  </style>
</head>
<?php
if($_GET["userName"]==$_SESSION['userName']){
    $kullaniciYetki = true;//gösterilen kullanıcı kendisi ise ....
}
else
    $kullaniciYetki = false;

?>
<body style="font-family: 'Bree Serif', serif;" >
  <div class="container-fluid" style="padding:0px;">



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">EbeveynBlog</a>
   

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      
    </div>
  </nav>

<!-- Large modal -->
  <?php 
	define("TITLE", "Home | Web Project");
	include ("partialViews/postCreateModal.php"); 
?>
<!-- Large modal End -->


    <a class="btn btn-light" id="menuControl" data-toggle="modal" data-target="#exampleModalCenter" style="z-index:1;">
     <span class="fas fa-bars fa-2x"></span>
   </a>
   <div class="row mt-4">
     <div class="col-md-3" id="userMenu">
       <div class="mt-4">
        
         <?php /**/ 
            include("partialViews/menu.php");
         ?>
       </div>
     </div>
     <div class="col-md-7" id="posts" style=" padding-top:0px; ">
         <div class="row mt-4">
         <div class="col-md-10 col-sm-10" style="margin:auto;  padding:10px;" > 
             <form action="db/updatePhoto.php" method="POST" enctype="multipart/form-data">
                 <div class="row">
                     <div class="col-md-12 text-center" style="padding:10px;">
                       <img <?php if($kullaniciYetki ) echo 'data-toggle="modal" data-target=".bd-example-modal-sm"' ?>
                       <?php if($userPhotoUrl =="")
                       echo 'src="userIcon.png"';  
                       else
                       echo "src=$userPhotoUrl";
                       ?> style="width:150px;  " class="rounded-circle img-fluid  " alt="...">
                     </div>
                   </div> 
                   <div class="col-md-12" style="text-align:center; visibility:hidden">
                       <?php if(!$kullaniciYetki) echo "<!--"; ?>
                    
                    
                    <div id="imageUploadDiv" style=" height:0px; ">
                      <input type="file" accept="image/*" id="dosyaSec" name="yukle_resim" />
                      
                      </div>
                     <!-- <input id="photoUpdateSubmit" type="submit" class="btn btn-success" value="Değişiklikleri Kaydet"/> -->
                    <?php if(!$kullaniciYetki) echo "-->"; ?>
                   </div> 
                   <div class="col-md-12" style="text-align:center">
               <button type="submit" class='btn btn-primary' style="display:none;"  name="resimyukle" id="updateBtn"> Update Your Photo! </button>
               </div>
               </form>
               <?php if(!$kullaniciYetki) echo "<!--"; ?>
              
               <?php if(!$kullaniciYetki) echo "-->"; ?> 
               </div>
             </div>
             <!-- Small modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-sm">
  <div class="modal-content">
  <div class="row">
                     <div class="col-md-12 text-center" style="padding:10px;">
                      <p id="modalPhoto"></p>
                     </div>
                   </div> 
                  
  <div class="row mt-3 mb-4">
          <button style="margin:auto;" class="btn btn-success" id="uploadProfilPhoto">Fotoğraf Güncelle</button>
        </div>
       
        <div class="row mt-3 mb-4">
          <button id="updateModal"  style="margin:auto; display:none;" class="btn btn-danger">Değişiklikleri Kaydet</button>
        </div>
  </div>
</div>
</div>






       <div class="row mt-4">
         <form  action="db/updateProfil.php" method="POST" class="col-md-10 col-sm-10 mb-4" style="margin:auto; border:1px solid gray; padding:50px; padding-bottom:20px;">
           <div class="form-row">
             
            
           <div class="form-group col-md-12">
           <label for="inputAddress">Full Name</label>
           <input type="text" class="form-control" name="fullName" id="inputAddress" placeholder="Full Name" value="<?php echo $profilBilgisi['fullName'];?>" <?php if(!$kullaniciYetki) echo " readonly"; ?>>
         </div>
       
           </div>
           
           <div class="form-group">
               <label for="inputEmail4">Email</label>
               <input type="email" class="form-control" name="email" id="email" placeholder="Email" value=<?php echo $profilBilgisi['email']; if(!$kullaniciYetki) echo " readonly"; ?>>
             </div>
           <div class="form-row">
                <div class="form-group col-md-6">
             <label for="inputAddress">Username</label>
             <input type="text" class="form-control"  name="userName" id="inputAddress" readonly  value=<?php echo $profilBilgisi['userName']; ?>>
           </div>
			 <div class="form-group col-md-6">
               <label for="inputEmail4">Register Date</label>
               <input type="" class="form-control" id="inputEmail4" readonly placeholder="" value=<?php echo $profilBilgisi['registerDate']; if(!$kullaniciYetki) echo " readonly"; ?>>
             </div>
			
            
             <div class="form-group col-md-12">
                 <label for="inputAddress">Biographi</label>
                 <textarea type="password" name="biography" <?php if(!$kullaniciYetki) echo " readonly"; ?> class="form-control" placeholder="Write something about yourself"><?php echo $profilBilgisi['biography'];?></textarea>
               </div>
           </div>
           <?php
       if($kullaniciYetki){
       echo "<div class='col-md-10 col-sm-10 text-center' style='margin:auto '>
           <button type='submit' class=' btn btn-danger '>Edit</button>
         </div>";
        } ?>
          
         </form>
       </div>
       
      
        
        
     </div>
     <div class="col-md-2" style="background-color:transparant;">

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
       
       <div class="list-group">
	   <?php
if($_SESSION["admin"]==true){
	echo   '<button type="button" class="list-group-item list-group-item-action " data-toggle="modal" data-target=".bd-example-modal-lg" id="urunekle">
           Ürün Ekle
         </button>';
} 
?> 

    
         <button type="button" class="list-group-item list-group-item-action" id="homePageModal">Ana Sayfa</button>
         <button type="button" class="list-group-item list-group-item-action" id="userPostsModal <?php if($_SESSION['login']!=true) echo 'disabled'; ?>">Postlarım</button>
     
         <button type="button" class="list-group-item list-group-item-action" id="changePasswordModal <?php if($_SESSION['login']!=true) echo 'disabled'; ?>">Şifre Değiştir</button>

         <button type="button" class="list-group-item list-group-item-action" id="hesapBilgilerimModal <?php if($_SESSION['login']!=true) echo 'disabled'; ?>">Hesap Ayarlarım</button>
         <button type="button" class="list-group-item list-group-item-action" id="signOutModal <?php if($_SESSION['login']!=true) echo 'disabled'; ?>">Çıkış</button>

       </div>



       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <!--   <button type="button" class="btn btn-primary">Save changes</button>-->

       </div>
     </div>
   </div>
 </div>




  <!--<script type="text/javascript" src="node_modules/froala-editor/js/froala_editor.pkgd.min.js"></script>-->

  <script>
  
   /* (function () {
      new FroalaEditor("#edit")
    })()
    */
  </script>
 
<script src="node_modules\jquery\dist\jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


	<script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/main.js"></script>
    <script>  
      $(document).ready(function(){
          
            /*$("#btnPostCreate").click(function(){

              console.log("click");
                //window.location = "index.php";
                $.ajax({
              type: "POST",
              url: 'db/newPost.php',
              data: {text: $("div.fr-box.fr-basic .fr-element").html(),title: $("#postTitle").val(),
                      photo:$("#productPhoto").val()},
              success: function(data){
              alert(data);
              },
              error: function(){
              alert('error!');
                  }
              });
              $("div.fr-box.fr-basic .fr-element").text("");
              $("#postTitle").val("");
              $("#roductPhoto").val("");

      });*/
          
        
       /* $("#dosyaSec").change(function(){
          
          var fileName = $(this).val();      
          console.log("a"+fileName+"a");
          $("#updateBtn").css("display","inline-block");
          $("#updateModal").css("display","inline-block");
        });

        $("#updateModal").click(function(){
          $("#updateBtn").click();
        });*/

      
        $("#uploadProfilPhoto").click(function(){
          
            $("#dosyaSec").click();
            
        });
        
        /* Modal Menu CLİCK*/
          /*  Menu Click  Scripts */ 
        $("#urunekle").click(function(){
        window.location = "urunekle.php";
        });
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
      });
  </script>
<script>
$("#cikis").click(function(){
  window.location = "db/signOut.php";
});

$("#myPosts").click(function(){
  window.location = "userPosts.php?user="+"<?php echo $profilBilgisi['id']?>";
});
</script> 
</body>

</html>