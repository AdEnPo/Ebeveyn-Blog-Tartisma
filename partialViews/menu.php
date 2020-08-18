<div class="list-group">
<?php
if($_SESSION["admin"]==true){
	echo   '<button type="button" class="list-group-item list-group-item-action " data-toggle="modal" data-target=".bd-example-modal-lg">
           Post Oluştur
         </button>';
} 
?> 

     
	  <button type="button" class="list-group-item list-group-item-action" id="homePage">Ana Sayfa</button>
         <button type="button" class="list-group-item list-group-item-action" id="userPosts">Postlarım</button>

         <button type="button" class="list-group-item list-group-item-action" id="changePassword">Şifre Değiştir</button>

         <button type="button" class="list-group-item list-group-item-action" id="hesapBilgilerim">Hesap Ayarlarım</button>
         <button type="button" class="list-group-item list-group-item-action" id="signOut">Çıkış</button>

       </div>


