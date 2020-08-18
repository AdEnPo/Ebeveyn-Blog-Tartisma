<?php
  session_start();
?>
	<nav class="navbar navbar-expand-md fixed-top navbar-light" id="nav">
  <a class="navbar-brand" href="index.php">Anasayfa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Size Özel <span class="sr-only">(current)</span></a>
      </li>
      <?php if($_SESSION["login"] == "true") echo "<!--" ?>
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Giriş Yap<span class="sr-only">(current)</span></a>
      </li>
      <?php if($_SESSION["login"] == "true") echo "-->" ?>
      <?php if($_SESSION["login"] != "true") echo "<!--" ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="fa fa-user"></span> <?php if($_SESSION["login"] == "true") echo $_SESSION["userName"] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href=" <?php echo "profileShow.php?userName=".$_SESSION['userName']; ?>"> Profil</a>
          <a class="dropdown-item" href="#">Hesap Ayarları</a>
          <a class="dropdown-item" href="db/signOut.php">Çıkış</a>
          <div class="dropdown-divider"></div>
          <?php  if($_SESSION["admin"]=="true") echo '<a class="dropdown-item" href="adminPaneli.php">Admin Paneli</a>'; 
          ?>
        
        </div>
      </li>
      <?php if($_SESSION["login"] != "true") echo "-->" ?>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <a href="Search.php" class="btn btn-outline-success my-2 my-sm-0">Search</a>
    </form>
  </div>
</nav>


