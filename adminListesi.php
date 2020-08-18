
<?php
include ("db/adminListesi.php"); 
 session_start();
 if($_SESSION["admin"]!="true")
  header('Location: index.php');
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

<body style="font-family: 'Bree Serif', serif;" >
 <div class="container-fluid" style="padding:0px;">



 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="#">Ebeveyn Blog</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
     aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         <a class="nav-link" href="index.php">Ana Sayfa
           <span class="sr-only">(current)</span>
         </a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="adminPaneli.php">Admin Paneli</a>
       </li>
     
     </ul>
     <form class="form-inline my-2 my-lg-0">
   
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Create Post</button>
     </form>
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
     
    <div class="offset-md-1 mt-4 col-md-10" id="posts" style=" padding-top:0px; ">
         
          <div class="text-center">
          <?php 
             if($_GET["durum"]!=null && $_GET["durum"]!="")
               {echo '<div class="alert alert-success" role="alert">';
               echo $_GET["durum"];
             echo '</div>';}
             ?>
          </div>  
         
           <div class="row mt-4 mb-4">
          
             <div class="col-md-12 text-center">
           <h3>Admin Listesi </h3>
            </div>
           
           </div>    
<table class="table table-striped table-dark">
 <thead>
   <tr>
     <th scope="col">Kullanıcı Adı</th>
     <th scope="col">İsim - Soyisim</th>
    
     
     <th scope="col">Tarih</th>
     <th scope="col" style="text-align:center">Adminlik </th>
   </tr>
 </thead>
 <tbody>
 <?php
       while($sonuc = mysqli_fetch_assoc($adminList))
       {  
           $userId = $sonuc["id"];  
           $userName=$sonuc["userName"];
         ?>
 <tr>
 <td> <a style="color:#27DE40" href="profileShow.php?userName=<?php echo  $userName ?>"><?php echo  $userName ?></td>
     <td><?php echo $sonuc["fullName"] ?> </td>
    
    
    
     <td>
     <?php 
           echo $sonuc["registerDate"];  
         ?>
     </td>
     <td style="text-align:center"> 
     <?php 
     $userId=$sonuc["id"];
     echo '<a href="db/blockAdmin.php?userId='.$userId.'" class="btn btn-danger btn-sm">Adminlikten Çıkar</a>';
     ?>
     
     </td>
   </tr>	
  
   <?php  } ?>
 </tbody>
</table>

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
          <button type="button" class="list-group-item list-group-item-action active" data-toggle="modal" data-target=".bd-example-modal-lg">
            Post Oluştur
          </button>
          <button type="button" class="list-group-item list-group-item-action" id="homePage">Ana Sayfa</button>
          <button type="button" class="list-group-item list-group-item-action" id="userPosts">Postlarım</button>
          <button type="button" class="list-group-item list-group-item-action">Yararlı Bulunanlar</button>
          <button type="button" class="list-group-item list-group-item-action" disabled>Şifre Değiştir</button>
          <button type="button" class="list-group-item list-group-item-action" disabled>İletişim</button>
          <button type="button" class="list-group-item list-group-item-action" disabled>Hesap Ayarlarım</button>
          <button type="button" class="list-group-item list-group-item-action" disabled>Çıkış</button>

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
  

     /*  Menu Click  Scripts */ 
       $("#userPosts").click(function(){
         window.location = "userPosts.php?user="+"<?php echo $_SESSION["userId"];?>";
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

     //  $("#photoUpdate").click(function(){
         
     //  });


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