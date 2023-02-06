<?php 

require_once("database.php");


function FaireUnPost($commentaire, $dateDuPost, $nomMedia, $typeMedia, $posted){
    
    
    try {
        if (!$posted) {
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
        
        }
        $idPost = LastIdPost();
        InsertMediaInPost($typeMedia, $nomMedia, $dateDuPost, $idPost);

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


function InsertMediaInPost($typeMedia, $nomMedia, $dateDeCreation, $idPost){
    
        $sql = "INSERT INTO MEDIA(typeMedia, nomMedia, dateDeCreation, idPost) VALUES (?, ?, ?, ?);";
        $data = [            
            $typeMedia,             
            $nomMedia,            
            $dateDeCreation,            
            $idPost        
        ];
        dbRun($sql, $data);
}


function takeAllPost(){
    $sql = "SELECT * FROM POST ORDER BY dateDeCreation DESC;";

    return dbRun($sql)->fetchAll(PDO::FETCH_ASSOC);

}

function takeMediaByIdPost($idPost){

    $sql = "SELECT * FROM MEDIA WHERE idPost = ?";

    $data = [
        $idPost
    ];

    return dbRun($sql, $data)->fetchAll(PDO::FETCH_ASSOC);
}

function VerifyPost($commentaire){

    if($commentaire!="" && $commentaire!=null){
        return true;
    }else{

		return "Vous devez ajouter un commentaire a votre poste";

	}
}
