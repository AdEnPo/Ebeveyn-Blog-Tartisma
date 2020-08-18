<?php 
session_start();
if($_SESSION["login"]!="true")
header("Location: index.php");

	define("TITLE", "Home | Web Project");
  include ("includes/header.php"); 
  include ("db/connection.php"); 
  
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Ana Sayfa</a>
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
  <div class="row mt-4">
    <div class="col-md-6 offset-md-3">
    <div class="card w-75" style="border-color:#007bff; ">
    
        
     
    <div class="col-md-12" style="text-align:center;">
    <img src="http://www.sclance.com/pngs/login-png/login_png_812312.png" class="card-img-top" style="padding:10px; width:150px;" alt="...">
    </div>
    <div class="card-body" style="padding-top:0px;">
      
      <div class="col-md-12 text-center">
        <span style="color:red"><?php if($_GET["durum"]!=null) echo $_GET["durum"]; ?></span>
      </div>
      
 
    <div class="row girisPartContent" id="parca">
          <form action="db/sifreDegistir.php" method="post" class="col-md-12 col-sm-12" style="margin:auto;  padding:50px; padding-top:0px; padding-bottom:10px;">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label >Eski Şifreniz</label>
                <input type="password" class="form-control" required id="oncekiParola" name="oncekiParola" placeholder="Şimdiki Parolanız">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label >Yeni Şifreniz</label>
                <input type="password" onchange="sifreKontrol();" class="form-control" required id="yeniParola" name="yeniParola" placeholder="Yeni Parolanız" >
              </div>
            </div>
            <div class="col-md-12 text-center">
              <p style="color:red; margin:0px;" id="sifreDurum"></p>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-12">
                <label >Yeni Şifreniz Tekrar</label>
                <input type="password" onchange="sifreKontrol();" class="form-control" required id="yeniParolaTekrar" name="yeniParolaTekrar" placeholder="Yani Parolanız">
              </div>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-success" type="submit">DEĞİŞTİR</button>
            </div>
          </form>  
    </div>
    
    
  
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

    function sifreKontrol(){
     
      if($("#yeniParola").val() == $("#yeniParolaTekrar").val())
         $("#sifreDurum").text("");
      else
        $("#sifreDurum").text("Şifreler Uyuşmuyor");
    }


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