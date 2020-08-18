<?php 
session_start();
if($_SESSION["login"]=="true")
header("Location: index.php");

	define("TITLE", "Home | Web Project");
  include ("includes/header.php"); 
  include ("db/connection.php"); 
  
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">EbeveynBlog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Ana Sayfa <span class="sr-only">(current)</span></a>
      </li>
    
     
    </ul>
    
  </div>
</nav>
<?php 
	include ("includes/header.php"); 
?>
<div class="container-fluid" >  
  <div class="row mt-4">
    <div class="col-md-6 offset-md-3">
    <div class="card w-75" style="border-color:#007bff; border-top-color:transparent">
    <div class="btn-group btn-group" role="group" aria-label="...">
      <div class="btn btn-primary" id="girisPartBtn">Giriş</div>
      <div class="btn btn-outline-primary" id="kaydolPartBtn">Kaydol</div>

    </div>
        
     
    <div class="col-md-12" style="text-align:center;">
    <img src="http://www.sclance.com/pngs/login-png/login_png_812312.png" class="card-img-top" style="padding:10px; width:150px;" alt="...">
    </div>
    <div class="card-body" style="padding-top:0px;">
      
      <div class="col-md-12 text-center">
        <span style="color:red"><?php if($_GET["durum"]!=null) echo $_GET["durum"]; ?></span>
      </div>
      
      <!-- SignIn -->
    <div class="row girisPartContent" id="parca">
          <form action="db/signIn.php" method="post" class="col-md-12 col-sm-12" style="margin:auto;  padding:50px; padding-top:0px; padding-bottom:10px;">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail">Kullanıcı Adı</label>
                <input type="text" class="form-control" required id="SignInUserName" name="SignInUserName" placeholder="Kullanıcı Adı" value=<?php echo $profilBilgisi['email']; ?>>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Parola</label>
                <input type="password" class="form-control" required id="SignInPassword" name="SignInPassword" placeholder="Parola" value=<?php echo $profilBilgisi['email']; ?>>
              </div>
            </div>
            <div class="col-md-12 text-right">
                <button class="btn btn-success" type="submit">Sign In</button>
            </div>
          </form>  
    </div>
      <!-- SignIn  End-->
      <!-- SignUp -->
    <div class="row kaydolPartContent" id="parca" style="display:none;">
          <form action="db/signUp.php" method="post" class="col-md-12 col-sm-12" style="margin:auto;  padding:50px; padding-top:0px; padding-bottom:10px;">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" required id="SignUpEmail" name="SignUpEmail" placeholder="Email" value=<?php echo $profilBilgisi['email']; ?>>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputUserName">Kullanıcı Adı</label>
                <input type="text" class="form-control" required id="SignUpUserName" name="SignUpUserName" placeholder="Kullanıcı Adı" value=<?php echo $profilBilgisi['email']; ?>>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputPassword">Parola</label>
                <input type="password" class="form-control" required id="SignUpPassword" name="SignUpPassword" placeholder="Parola" value=<?php echo $profilBilgisi['email']; ?>>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputPasswordAgain">Parola Tekrar</label>
                <input type="password" class="form-control" required id="SignUpPasswordAgain" name="SignUpPasswordAgain" placeholder="Parola Tekrar" value=<?php echo $profilBilgisi['email']; ?>>
              </div>
            </div>
            <div class="col-md-12 text-right">
                <button class="btn btn-success" type="submit">Sign Up</button>
            </div>
          </form>  
    </div>
      <!-- SignUp End-->
   
  
  </div>
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



$("#kaydolPartBtn").click(function(){
    $(".girisPartContent").css("display","none");
    $(".kaydolPartContent").css("display","");
    $("#girisPartBtn").removeClass("btn-primary");
    $("#girisPartBtn").addClass("btn-outline-primary");
    $(this).css("color","#fff");
    $("#girisPartBtn").css("color","#007bff");
    $(this).addClass("btn-primary");
    
    
});

$("#girisPartBtn").click(function(){
    $(".kaydolPartContent").css("display","none");
    $(".girisPartContent").css("display","");
    $("#kaydolPartBtn").removeClass("btn-primary");
    $("#kaydolPartBtn").addClass("btn-outline-primary");
    $(this).css("color","#fff");
    $("#kaydolPartBtn").css("color","#007bff");
    $(this).addClass("btn-primary");
    
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