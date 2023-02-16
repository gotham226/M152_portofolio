<?php
require_once('./php/poster.php');

if($_GET['idPost'] == null){
	header('Location: index.php');
    exit;
}

if(isset($_POST['supprimer'])){

    $medias = takeMediaByIdPost($_GET['idPost']);

	if($medias!=[]){
		foreach($medias as $media){
			$nameMedia = $media['nomMedia'];
			
			unlink('./imageMedia/'.$nameMedia);
		}
	}
    

    DeletePost($_GET['idPost']);
    header('Location: index.php');
    exit;

}else{
    if(isset($_POST['annuler'])){
        header('Location: index.php');
        exit;
    }
}



?>

<!DOCTYPE html>


<html lang="fr">
	<head>
		
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Facebook Theme Demo</title>
		
		<link rel="stylesheet" href="css/style.css">
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
							<div class="full col-sm-9" >
							  
								<!-- content -->                      
								<div class="row" >
								  
								 <!-- main col left --> 
								 <div class="col-sm-5" style="margin-left: 35%;">
								   
									  
										
										<form action="delete.php?idPost=<?=$_GET['idPost']?>" method="POST">

                        
                                            <label for="supprimer">Est-tu sur de supprimer ton post ?</label>
                                            <br>
                                            <button type="submit" class="btn btn-primary pull-left" name="supprimer">Oui</button>
                                            <button type="submit" class="btn btn-primary pull-left"name="annuler">Annuler</button>


                                        </form> 

									  
								  </div>
                                  
							 
								
							  
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

