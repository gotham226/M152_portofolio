<?php 

require_once("database.php");

define( "SIZE_IMAGE",1000);


function FaireUnPost($medias, $commentaire, $dateDuPost, $idPost, $uploads_dir){
    $metaDataString = "";
    
    try {
            $transactionStarted = false;
            if (!connexionDB()->inTransaction()) {
                connexionDB()->beginTransaction();
                $transactionStarted = true;
            }
        
            $sql = "INSERT INTO POST(commentaire, dateDeCreation) VALUES (?, ?);";
            $data = [            
                $commentaire,            
                $dateDuPost        
            ];
            dbRun($sql, $data);
            if ($transactionStarted) {
                connexionDB()->commit();
            }
        
        

        if($idPost==null){
            $idPost = LastIdPost();
        }

        if(count((array)$medias) > 0){

            for($i = 0; $i < count((array)$medias['name']); $i++){
                    
                    $typeMedia = $medias['type'][$i];
                    $extensionsFichier = substr(strrchr($medias['name'][$i],'.'),1);
            
                    if($typeMedia==""){
                        $typeMedia= "image/".$extensionsFichier;
                    }
                    $nomMedia = $medias['name'][$i].$i.$dateDuPost.".".$extensionsFichier;
                    
                    if(move_uploaded_file($medias['tmp_name'][$i], "$uploads_dir/$nomMedia")){
                        $metaDatas = RecupMetaData($uploads_dir, $nomMedia);

                        //regler ce probleme !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                        foreach($metaDatas as $metaData){
                                $metaDataString = $metaDataString . "/". $metaData;
                            
                        }

                        InsertMediaInPost($typeMedia, $nomMedia, $dateDuPost, $idPost, $metaDataString);
                        $erreur = "Votre post a été publié !";
                    }else{
                        throw new Exception();
                    }
                
            }
            RediemensionImage($idPost, $uploads_dir);
            return $erreur;
        }
        

    } catch (Exception $e) {
        connexionDB()->rollBack();
        throw $e;
    }

}

function LastIdPost(){
    $sql = "SELECT * FROM POST ORDER BY idPost DESC LIMIT 1";
    $data = [];
    $result = dbRun($sql, $data)->fetchAll(PDO::FETCH_ASSOC);
    return $result[0]['idPost'];
}


function InsertMediaInPost($typeMedia, $nomMedia, $dateDeCreation, $idPost, $metaData){
    
        $sql = "INSERT INTO MEDIA(typeMedia, nomMedia, dateDeCreation, idPost, metaData) VALUES (?, ?, ?, ?, ?);";
        $data = [            
            $typeMedia,             
            $nomMedia,            
            $dateDeCreation,            
            $idPost,
            $metaData      
        ];
        dbRun($sql, $data);
}


function takeAllPost(){
    $sql = "SELECT * FROM POST ORDER BY dateDeCreation DESC;";

    return dbRun($sql)->fetchAll(PDO::FETCH_ASSOC);

}

function takePostById($idPost){

    $sql = "SELECT * FROM POST WHERE idPost = ?;";

    $data = [            
        $idPost
    ];

    return dbRun($sql, $data)->fetch(PDO::FETCH_ASSOC);
}

function takeMediaByIdPost($idPost){

    $sql = "SELECT * FROM MEDIA WHERE idPost = ? ORDER BY dateDeCreation ASC";

    $data = [
        $idPost
    ];

    return dbRun($sql, $data)->fetchAll(PDO::FETCH_ASSOC);
}



function ChekMedias($medias, $commentaire, $sizeAllImage, $peutEtrePublier, $erreur, $uploads_dir, $posted, $idPost){
    
    if($commentaire!="" && $commentaire!=null){
		

		if($medias!=[] && $medias!=null && $medias['name'][0] !=""){
			

			for($i = 0; $i < count((array)$medias['name']); $i++){
				$sizeAllImage += $medias['size'][$i];
			}
			// Test si la taille de toute les image regrouper n'est pas trop grand
			if($sizeAllImage<=70000000){
				
				// Parcours tout les media a upload
				for($i = 0; $i < count((array)$medias['name']); $i++){

					// Test si chaque image n'est pas trop grande
					if($medias['size'][$i] <= 3000000){
						
						$typeMedia = $medias['type'][$i];
						$extensionsFichier = substr(strrchr($medias['name'][$i],'.'),1);

						if($typeMedia==""){
							$typeMedia= "image/".$extensionsFichier;
						}
						// Test si le fichier est bien une image
						if($typeMedia=="image/png" || $typeMedia=="image/jpeg" || $typeMedia=="image/jpg" || $typeMedia=="video/mp4" || $typeMedia=="audio/mpeg"){
							
							$peutEtrePublier = true;
							$message ="Votre post a été publié !";

						}else{
							$erreur = "Le fichier ".$medias['name'][$i]." n'est pas une image, une vidéo ou un fichier audio.";
							$peutEtrePublier = false;
						}

					}else{
						$erreur = "Le fichier ".$medias['name'][$i]." est trop grande";
						$peutEtrePublier = false;
					}
				}

			}else{
				
				$erreur = "La taille de tous les fichiers cumulés est trop grandes ";
				$peutEtrePublier = false;
			}

		}else{
			$dateDuPost = date( "Y-m-d H:i:s");	
            
			$idPost = FaireUnPost($medias, $commentaire, $dateDuPost, $idPost, $uploads_dir);
            $erreur = "Votre post a été publié !";
            $posted = true;
			
		}
			
	}else{
		$erreur = "Vous devez ajouter un commentaire a votre poste";
	}

    if($erreur == null){
        $dateDuPost = date( "Y-m-d H:i:s");			
        
        $erreur = FaireUnPost($medias, $commentaire, $dateDuPost, $idPost, $uploads_dir);
        
        
    }

    return $erreur;
	
}

function DeletePost($idPost){

        $sql = "DELETE FROM MEDIA WHERE idPost = ?";
        $data = [
            $idPost,
        ];
    
        dbRun($sql, $data); 

        $sql = "DELETE FROM POST WHERE idPost = ?";
        $data = [
            $idPost,
        ];

        dbRun($sql, $data); 
}

function DeleteOneMediaByIdMedia($idMedia, $nomMedia){
    $sql = "DELETE FROM MEDIA WHERE idMedia = ?";
        $data = [
            $idMedia,
        ];


        dbRun($sql, $data);         
}

function UpdatePost($commentaire, $idPost)
{
    $dateDuPost = date( "Y-m-d H:i:s");

    $sql = "UPDATE POST SET commentaire = ?, dateDeModification = ? WHERE idPost = ?";

    $data=[
        $commentaire,
        $dateDuPost,
        $idPost
    ];
    
    dbRun($sql, $data);
}



function RediemensionImage($idPost, $uploads_dir){

    $medias = takeMediaByIdPost($idPost);

    foreach($medias as $media){

        $typeMedia = $media['typeMedia'];

        if($typeMedia=="image/png" || $typeMedia=="image/jpeg" || $typeMedia=="image/jpg"){
            $nomMedia = $media['nomMedia'];

            // Ouvrir l'image téléchargée
            if($typeMedia=="image/jpg" || $typeMedia=="image/jpeg"){
                $image = imagecreatefromjpeg("$uploads_dir/$nomMedia");

            }else if($typeMedia=="image/png"){
                $image = imagecreatefrompng("$uploads_dir/$nomMedia");
            }
            

            // Déterminer la nouvelle taille de l'image
            $largeur = SIZE_IMAGE;
            $ratio = $largeur / imagesx($image);
            $hauteur = imagesy($image) * $ratio;

            // Créer une nouvelle image avec la taille spécifiée
            $nouvelle_image = imagecreatetruecolor($largeur, $hauteur);

            // Copier et redimensionner l'image originale vers la nouvelle image
            imagecopyresampled($nouvelle_image, $image, 0, 0, 0, 0, $largeur, $hauteur, imagesx($image), imagesy($image));

            // Enregistrer la nouvelle image
            if($typeMedia=="image/jpg" || $typeMedia=="image/jpeg"){
                imagejpeg($nouvelle_image, "$uploads_dir/$nomMedia");

            }else if($typeMedia=="image/png"){
                imagepng($nouvelle_image, "$uploads_dir/$nomMedia");
            }
            

        }

        
    }

    
}

function RecupMetaData($uploads_dir, $nomMedia){
    $filename = "$uploads_dir/$nomMedia"; // Chemin vers l'image

    // Lecture des métadonnées de l'image
    $metaData = exif_read_data($filename);

    // Suppression des métadonnées de l'image pour économiser de l'espace de stockage
    
    return $metaData;
}
