<?php
$mysqlConnection = new PDO(
    'mysql:host=localhost;dbname=tp_php_sio;charset=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

// ordre de mission
$requete = $mysqlConnection->prepare('DELETE FROM  atelier where id=:id');
//execution de la requete
$requete->execute( ["id"=>$_GET["id"]]);
session_start();
$_SESSION["success"]="Atelier supprimé avec succès";
   
header("location:list.php");
?>