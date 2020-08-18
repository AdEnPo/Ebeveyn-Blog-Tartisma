
	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ebeveyn</title>
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.min.css">
   	<link rel="stylesheet" type="text/css" href="assets/styles.css"> <link href="content/progressBar.scss" rel="stylesheet/scss" type="text/css"></link>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="../style.css">
	<link href="node_modules/froala-editor/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="node_modules/froala-editor/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"/>






</head>

<style>
@media (max-width: 768px) {
	.ulList{
		margin-right:-15px;
		margin-bottom:50px;
	}
	.col-md-7{
		padding:0px; 0px;
	}
	.col-md-6{
		padding:0px;
	}

}
#likeIcon :hover{
	background-color:#1A86C1;
}
#dislikeIcon : hover{
	background-color:#1A86C1;
}
</style>
<body style=" font-family: 'Bree Serif', serif;">
	

<?php 
	
   session_start();
    include("db/connection.php");

    $adminPosts = mysqli_query($db,"SELECT * FROM posts INNER JOIN users ON posts.userId=users.id where users.admin=1 and posts.status!=-2 and posts.status!=-1 Order by postId DESC Limit 1,10");
    $adminAnaPost = mysqli_query($db,"SELECT * FROM posts INNER JOIN users ON posts.userId=users.id where users.admin=1 and posts.status!=-2 and posts.status!=-1 Order by postId DESC Limit 1")->fetch_assoc();
    $enSonEklenenler = mysqli_query($db,"SELECT * FROM posts where status!=-2 and status!=-1 Order by postId DESC Limit 10");
    $enCokBegenilenler = mysqli_query($db,"select * from likes inner JOIN posts on likes.postId = posts.postId where posts.status!=-2 and posts.status!=-1 GROUP by likes.postId ORDER by sum(likes.status) desc");
    //encok begeni alanlara göre sıralıdır. .... 
?>

	<nav class="navbar navbar-expand-md fixed-top navbar-light" id="nav">
  <a class="navbar-brand" href="index.php">Anasayfa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
	    <?php  if($_SESSION["login"]=="true") echo '<a class="nav-link" href="sizeOzel.php">Size Özel </a>'; 
          ?>
       
      </li>
      <?php if($_SESSION["login"] == "true") echo "<!--"; ?>
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Giriş Yap<span class="sr-only">(current)</span></a>
      </li>
      <?php if($_SESSION["login"] == "true") echo "-->"; ?>
      <?php if($_SESSION["login"] != "true") echo "<!--"; ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="fa fa-user"></span> <?php if($_SESSION["login"] == "true") echo $_SESSION["userName"]; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href=" <?php echo "profileShow.php?userName=".$_SESSION['userName']; ?>"> Profil</a>
          <a class="dropdown-item" href="<?php echo "userPosts.php?user=".$_SESSION['userId']; ?>">Postlarım</a>
		  <a class="dropdown-item" href="<?php echo "sifreDegistir.php"; ?>">Şifre Değiştir</a>
          <a class="dropdown-item" href="db/signOut.php">Çıkış</a>
          <div class="dropdown-divider"></div>
          <?php  if($_SESSION["admin"]=="true") echo '<a class="dropdown-item" href="adminPaneli.php">Admin Paneli</a>'; 
          ?>
         
        </div>
      </li>
      <?php if($_SESSION["login"] != "true") echo "-->"; ?>
      
    
    </ul>

  </div>
</nav>

	<div class="text-center" style="">
		<h1>Baslik</h1>
	</div>

<div class="container" >

 <hr/>
     <h3>Öne Çıkanlar</h3>
        <hr/>
        <!-- Main Card -->

        <div class="row">
            <div class="col-md-7 col-lg-7 " style="">
                <a href="postDetail.php?postId=<?php echo $adminAnaPost['postId']; ?>" style="color:#495057"><div class=" card mb-3  CalloutBoderLeft" style="cursor:pointer; height:466px; overflow-y:hidden">
                    <img class="card-img-top img-fluid" src="https://cdn-images-1.medium.com/max/1400/1*u1QFySlQlYqBUCV_nRx9Tw.jpeg" alt="Card image cap"
                        style="padding:1px; width:1005px; height:300px; object-fit:cover">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $adminAnaPost["title"]; ?></h5>
                        <p class="card-text" id="mainMainPostContent" ><?php echo $adminAnaPost["text"]; ?></p>
                        <p class="card-text">
                            <small class="text-muted"><?php echo $adminAnaPost["datetime"]; ?></small>
                        </p>
                     
                    </div>
                </div></a>
            </div>
            <div class="col-md-5 " style=" ">
                <div class="row ozel-scrollbar " id="scrollDiv" style="padding:0px; height:466px; position:relative;  text-align: justify; overflow-y: scroll; background-color: #ECF0F1; background-color: #ECF0F1;  color:#2E4053; line-height: 1.6em">


                    <div class="list-group " style="">
                    <?php
                    $sayac=1; 
                    while($sonuc = mysqli_fetch_assoc($adminPosts))
                    {
                        ?>
                        <a href="postDetail.php?postId=<?php echo $sonuc["postId"]; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php echo $sonuc["title"] ?></h5>
                               
                            </div>
                            <p class="mb-1 postContent" id="mainPostContent<?php echo $sayac;?>" ><?php  echo $sonuc["text"]; ?></p>
                           
                            <small class="text-muted"><?php
                                    $userId= $sonuc["userId"]; 
                                    $userName= mysqli_query($db,"SELECT * FROM users where id='$userId'")->fetch_assoc();
                                    echo $userName["userName"];
                                    ?> 
                            
                            </small>
                        </a>
                    <?php $sayac++; } ?>
                       
                    </div>


                </div>
            </div>

            </div>



            
           
		   
        <div class="row">
            <div class="col-md-12">
               
                <hr class="mt-1">
            </div>
        </div>
		    <div class="row" style="padding-left:15px;">
            <div class="col-md-6 col-lg-6 " style="">
            <div class="row"><h4 class="ml-3">-> En Son Yazılar</h4> </div>
            <div class="row ozel-scrollbar  ulList" id="scrollDiv" style="padding:0px; margin-right:0px; height:466px; position:relative;  text-align: justify; overflow-y: scroll; background-color: #ECF0F1; background-color: #ECF0F1;  color:#2E4053; line-height: 1.6em">
                        
            
                                <div class="list-group " style="">
                                <?php
                                 
                                while($sonuc = mysqli_fetch_assoc($enSonEklenenler))
                                {
                                ?>
                                    <a href="postDetail.php?postId=<?php echo $sonuc["postId"]; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo $sonuc["title"] ?></h5>
                                       
                                    </div>
                                    <p class="mb-1 postContent" id="mainPostContent<?php echo $sayac;?>" ><?php  echo $sonuc["text"]; ?></p>
                                   
                                    <small class="text-muted"><?php
                                            $userId= $sonuc["userId"]; 
                                            $userName= mysqli_query($db,"SELECT * FROM users where id='$userId'")->fetch_assoc();
                                            echo $userName["userName"];
                                            ?> 
                                    
                                    </small>
                                </a>
                                    <?php $sayac++; } ?>
                                </div>
            
            
                            </div>
            </div>
           
            <div class="col-md-6 col-lg-6 " style="">
            <div class="row"><h4 class="ml-3">-> En Çok Beğenilenler</h4> </div>
                <div class="row ozel-scrollbar  ulList" id="scrollDiv" style="padding:0px; margin-right:0px; height:466px; position:relative;  text-align: justify; overflow-y: scroll; background-color: #ECF0F1; background-color: #ECF0F1;  color:#2E4053; line-height: 1.6em">


                    <div class="list-group " style="">
                    <?php
                    
                   while($sonuc = mysqli_fetch_assoc($enCokBegenilenler))
                   {
                   ?>
                       <a href="postDetail.php?postId=<?php echo $sonuc["postId"]; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                       <div class="d-flex w-100 justify-content-between">
                           <h5 class="mb-1"><?php echo $sonuc["title"] ?></h5>
                          
                       </div>
                       <p class="mb-1 postContent" id="mainPostContent<?php echo $sayac;?>" ><?php  echo $sonuc["text"]; ?></p>
                      
                       <small class="text-muted"><?php
                               $userId= $sonuc["userId"]; 
                               $userName= mysqli_query($db,"SELECT * FROM users where id='$userId'")->fetch_assoc();
                               echo $userName["userName"];
                               ?> 
                       
                       </small>
                   </a>
                       <?php $sayac++; } ?>
                       
                    </div>


                </div>
            </div>
            </div>

		<hr>
      

		<!-- Footer -->
		<footer class="page-footer font-small special-color-dark pt-4">

		
		</footer>
		<!-- Footer -->


	<script src="node_modules\jquery\dist\jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


	<script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/main.js"></script>
	<script src="build/squire-raw.js"></script>
	<script>
	
	
	
 $(document).ready(function(){ 
	var sayac = "<?php echo $sayac; ?>";
	for(var i=0; i<sayac; i++)
	{
		var text= $("#mainPostContent"+(i+1)).next().text();
		$("#mainPostContent"+(i+1)).next().html("<p>"+$("#mainPostContent"+(i+1)).next().text().substr(0,50)+"</p>");
		console.log( text.substr(0,10));
		$("#mainPostContent"+(i+1)).next().css("height","50");
	}
	var mainText= $("#mainMainPostContent".next().text();
		$("#mainMainPostContent").next().html("<p>"+$("#mainMainPostContent".next().text().substr(0,50)+"</p>");
	
		

	$(".postContent").next().addClass("aa");;

	setInterval(function(){
		if($("#new").css("visibility") == "visible")
		{
		  $("#new").css("visibility","hidden");
		}
		else
		{
		  $("#new").css("visibility","visible");
		}
	  },700);
  });
  
</script> 

  
</body>
</html>