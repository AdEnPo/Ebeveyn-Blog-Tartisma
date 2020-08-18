
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