<?php 

require_once("database.php");


function FaireUnPost($commentaire, $dateDuPost){

    

    $sql = "INSERT INTO POST(commentaire, dateDeCreation) VALUES (?, ?);";
    $data = [
        $commentaire,
        $dateDuPost
    ];

    dbRun($sql, $data);

    $idPost = connexionDB()->lastInsertId();
    return $idPost;

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
    $sql = "SELECT * FROM POST";
    
    return dbRun($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function takeMediaByIdPost($idPost){

    $sql = "SELECT * FROM MEDIA WHERE idPost = ?";

    $data = [
        $idPost
    ];

    return dbRun($sql, $data)->fetchAll(PDO::FETCH_ASSOC);
}


