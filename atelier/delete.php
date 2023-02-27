<?php
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

// ordre de mission
$requete = $mysqlConnection->prepare('DELETE FROM  atelier where id=:id');
//execution de la requete
$requete->execute( ["id"=>$_GET["id"]]);
session_start();
$_SESSION["success"]="Atelier supprimé avec succès";
   
header("location:index.php?route=list");
?>