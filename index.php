<?php
require_once('./php/poster.php');

$posts = takeAllPost();

if(isset($_GET['supprimer'])){
	DeletePost($_GET['idPost']);
	$_GET['idPost'] = null;
}
?>


<!DOCTYPE html>


<html lang="fr">
	<head>
		
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Facebook Theme Demo</title>
		
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="./css/style.css">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
		<script src="./assets/js/carousel.js"></script>
        
    	
    	<script src="https://kit.fontawesome.com/38bd885dbe.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="assets/css/facebook.css" rel="stylesheet">

	
    </head>
    
    <body>
        
        <div class="wrapper">
			<div class="box">
				<div class="row row-offcanvas row-offcanvas-left">
					
					 
					<!-- /sidebar -->
				  
					<!-- main right col -->
					<div class="column col-sm-10 col-xs-11" style="width: 100%;" id="main">
						
						<!-- top nav -->
						<div class="navbar navbar-blue navbar-static-top">  
							<div class="navbar-header">
							  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							  <i class="fa-solid fa-laptop-code fa-flip fa-2xl" id="c" style="--fa-animation-duration: 5s;"></i>
							</div>
							<nav class="collapse navbar-collapse" role="navigation">
							<form class="navbar-form navbar-left">
								<div class="input-group input-group-sm" style="max-width:360px;">
								  <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
								  <div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								  </div>
								</div>
							</form>
							<ul class="nav navbar-nav">
							  <li>
								<a href="./index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
							  </li>
							  <li>
								<a href="./post.php" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
								
							  </li>
							  <li>
								<a href="#"><span class="badge">badge</span></a>
							  </li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
								<ul class="dropdown-menu">
								  <li><a href="">More</a></li>
								  <li><a href="">More</a></li>
								  <li><a href="">More</a></li>
								  <li><a href="">More</a></li>
								  <li><a href="">More</a></li>
								</ul>
							  </li>
							</ul>
							</nav>
						</div>
						<!-- /top nav -->
						
					  
						<div class="padding">
							<div class="full col-sm-9">
							  
								<!-- content -->                      
								<div class="row">
								  
								 <!-- main col left --> 
								 <div class="col-sm-5">
								   
									  <div class="panel panel-default">
										<!-- <div class="panel-thumbnail"><img src="assets/img/bg_5.jpg" class="img-responsive"></div> -->
										<div class="panel-body">
										  <p class="lead">Welcome</p>
										  
										  <p>
											
											<img src="assets/img/uFp_tsTJboUY7kue5XAsGAs28.png" height="28px" width="28px">
										  </p>
										</div>
									  </div>


										
								   
								  </div>
								  <?php
								 if($posts!==[]){

								
								 
								 ?>
								  <!-- main col right -->
								  <div class="col-sm-7">
									   
										<div class="well"> 
										   <!-- <form class="form">
											<h4>Sign-up</h4>
											<div class="input-group text-center">
											<input class="form-control input-lg" placeholder="Enter your email address" type="text">
											  <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="button">OK</button></span>
											</div>
										  </form>
										</div>
							  
									   <div class="panel panel-default">
										 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
										  <div class="panel-body">
											<p><img src="assets/img/150x150.gif" class="img-circle pull-right"> <a href="#">The Bootstrap Playground</a></p>
											<div class="clearfix"></div>
											<hr>
											Design, build, test, and prototype 
		using Bootstrap in real-time from your Web browser. Bootply combines the
		 power of hand-coded HTML, CSS and JavaScript with the benefits of 
		responsive design using Bootstrap. Find and showcase Bootstrap-ready 
		snippets in the 100% free Bootply.com code repository.
										  </div>
									   </div>
									
									   <div class="panel panel-default">
										 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
										  <div class="panel-body">
											<img src="assets/img/150x150.gif" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
											<div class="clearfix"></div>
											<hr>
											
											<p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>
											
											<hr>
											<form>
											<div class="input-group">
											  <div class="input-group-btn">
											  <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
											  </div>
											  <input class="form-control" placeholder="Add a comment.." type="text">
											</div>
											</form>
											
										  </div>
									   </div>

									   <div class="panel panel-default">
										 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Portlet Heading</h4></div>
										  <div class="panel-body">
											<ul class="list-group">
											<li class="list-group-item">Modals</li>
											<li class="list-group-item">Sliders / Carousel</li>
											<li class="list-group-item">Thumbnails</li>
											</ul>
										  </div>
									   </div> -->
									   
									   
									   <?php
									   		// parcours tout les post
											foreach ($posts as $post) {
												$idPost = $post['idPost'];
												// recupere tout les medias de chaque post
												$medias = takeMediaByIdPost($idPost);
												?>
												<div class="panel panel-default">
													
													<div class="panel-body" style="background-color: #3B5999; color: white;">
										 			<?php
														// Affiche le commentaire du post
														echo "<p class=\"lead\">".$post['commentaire']."</p>";
														// Affiche la date du post
										  				

														// Parcours tout les media du post et les affiche
													  	foreach ($medias as $media) {
															if($media['typeMedia']=="image/png" || $media['typeMedia']=="image/jpeg" || $media['typeMedia']=="image/jpg"){

															
														  	?>
														  	<img src="imageMedia/<?=$media['nomMedia']?>" class="img-responsive">
														  	<?php
															}
															else{
																if($media['typeMedia']=="video/mp4"){
																	?>
																	<br>
																		<video controls width="100%" loop autoplay>
																			<source src="imageMedia/<?=$media['nomMedia']?>" type="video/mp4">
																		</video>
																	<?php
																}else{
																	if($media['typeMedia']=="audio/mpeg"){
																		?>
																		<br>
																		<audio controls width="100%">
																			<source src="imageMedia/<?=$media['nomMedia']?>" type="audio/mpeg">
																		</audio>

																		<?php
																	}
																}
														
															}
													  
													  
													  	}
														  echo "<p>".$post['dateDeCreation']."</p>";
														  echo "<div> <a href=\"modifier.php?idPost=$idPost\"> <button  style=\" color: blue; background-color: #0a78df00; border: none;\" class=\"material-icons button edit\">edit</button> </a>";

        												  echo "<a href=\"delete.php?idPost=$idPost\"> <button  style=\" color: red; background-color: #0a78df00; border: none;\"  class=\"material-icons button delete\">delete</button> </a></div>";
														  
														  
												  	?>
													</div>
													
									  			</div>
												
												
												
												<?php
											}
											
											?>
									   
									
								  </div>
							   </div>
							   <?php
							    } else{
									echo "C'est calme, beaucoup trop calme..";
								}
							 
							 ?>
							  
								<!-- <div class="row">
								  <div class="col-sm-6">
									<a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
								  </div>
								</div> -->
							  
								<!-- <div class="row" id="footer">    
								  <div class="col-sm-6">
									
								  </div>
								  <div class="col-sm-6">
									<p>
									<a href="#" class="pull-right">�Copyright 2013</a>
									</p>
								  </div>
								</div>
							  
							  <hr>
							  
							  <h4 class="text-center">
							  <a href="http://usebootstrap.com/theme/facebook" target="ext">Download this Template @Bootply</a>
							  </h4> -->
								
							  <hr>
								
							  
							</div><!-- /col-9 -->
						</div><!-- /padding -->
					</div>
					<!-- /main -->
				  
				</div>
			</div>
		</div>
		<script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
			$('[data-toggle=offcanvas]').click(function() {
				$(this).toggleClass('visible-xs text-center');
				$(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
				$('.row-offcanvas').toggleClass('active');
				$('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
				$('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
				$('#btnShow').toggle();
			});
        });
        </script>
		
		


        
        
</body>


		</html>