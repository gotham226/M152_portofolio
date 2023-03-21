<?php
require_once('./php/poster.php');

// Vérifier si l'ID du message a été transmis dans l'URL
if($_GET['idPost'] == null){

	// Si l'ID n'est pas défini, rediriger l'utilisateur vers la page d'accueil
	header('Location: index.php');
    exit;
}

// Récupérer le message correspondant à l'ID transmis dans l'URL
$post = takePostById($_GET['idPost']);

// Récupérer tous les médias associés au message
$medias = takeMediaByIdPost($_GET['idPost']);

// Initialiser les variables nécessaires pour le traitement des médias
$erreur = "";
$sizeAllImage = 0;
$uploads_dir = "./imageMedia";
$peutEtrePublier=false;
$message="";
$posted = false;

// Récupérer le commentaire posté par l'utilisateur
$commentaire = filter_input(INPUT_POST, "commentaire", FILTER_DEFAULT);
$safePost = filter_input_array(INPUT_POST);

// Vérifier si l'utilisateur a cliqué sur le bouton 'modifier'
if(isset($_POST['modifier'])){

    // Vérifier si le commentaire n'est pas vide
    if($commentaire!=""){

        // Mettre à jour le commentaire du message dans la base de données
        UpdatePost($commentaire, $_GET['idPost'], $medias, $safePost, $_FILES['media'], $erreur, $sizeAllImage, $peutEtrePublier, $uploads_dir);
        
        // Rediriger l'utilisateur vers la page d'accueil
        header('Location: index.php');
        exit;
    }else{
        // Afficher un message d'erreur si le commentaire est vide
        $erreur="Votre commentaire ne peut pas être vide";
    }

}

?>

<!DOCTYPE html>


<html lang="fr">
	<head>
		
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Facebook Theme Demo</title>
		
		<link rel="stylesheet" href="./css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
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
								   
									  
                                 <div class="panel panel-default" style="padding:3%">

                                 <form class="form-horizontal" method="post" action="modifier.php?idPost=<?=$_GET['idPost']?>" role="form" enctype="multipart/form-data">
												<ul class="ul-post" style="padding-left: 0;" >
													<li style="display: inline-block;"><h4>Modification de votre post</h4></li>
													
												</ul>
                                                <p style="color: red;"><?=$erreur?></p>
											
											
												<div class="form-group" style="padding:14px;">
												
												<textarea name="commentaire" class="form-control"><?=$post['commentaire']?></textarea>
												
												</div>
                                                <button type="submit" name="modifier" class="btn btn-primary pull-right" style="margin-botom: 10%;">Modifier</button>
                                               
												<ul class="list-inline">
													<li><input class="glyphicon glyphicon-upload" type="file" name="media[]" multiple="multiple" accept="image/png, image/jpeg, image/jpg, video/*, audio/mpeg"></li>
													<li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li>
                                                    
												</ul>

                                                <?php
												// Affichage des médias 
												if($medias!=null){ 
                                                    echo "<h3 style=\"text-align: center;\">Sélectionnez les médias que vous voulez supprimer </h3>";
                                                    }?>
                                                
                                                <?php
                                                    foreach ($medias as $media) {
                                                        $idMedia = $media['idMedia'];
                                                        if($media['typeMedia']=="image/png" || $media['typeMedia']=="image/jpeg" || $media['typeMedia']=="image/jpg"){

                                                        
                                                          ?>
                                                          <div style="background-color: #3B5999; color: white; padding:2%;">
                                                          <img src="imageMedia/<?=$media['nomMedia']?>" class="img-responsive">
                                                          <?php
                                                        }
                                                        else{
                                                            if($media['typeMedia']=="video/mp4"){
                                                                ?>
                                                                <br>
                                                                <div style="background-color: #3B5999; color: white; padding:2%;">
                                                                    <video controls width="100%" loop autoplay>
                                                                        <source src="imageMedia/<?=$media['nomMedia']?>" type="video/mp4">
                                                                    </video>
                                                                <?php
                                                            }else{
                                                                if($media['typeMedia']=="audio/mpeg"){
                                                                    ?>
                                                                    <br>
                                                                    <div style="background-color: #3B5999; color: white; padding:2%;">
                                                                    <audio controls width="100%">
                                                                        <source src="imageMedia/<?=$media['nomMedia']?>" type="audio/mpeg">
                                                                    </audio>

                                                                    <?php
                                                                }
                                                            }
                                                    
                                                        }
                                                        
                                                        echo "<div>";
                                                        echo "<input type=\"checkbox\" id=\"$idMedia\" name=\"$idMedia\">";
                                                        echo "</div></div>";
                                                           
                                                      }
                                                      
                                                  ?>
										  </form>       
                                    </div>            
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

