<?php
session_start();
if (isset($_POST["titre"])==false || empty($_POST["titre"])){

    $_SESSION["error"]="Le titre est obligatoire";
    header("location:edit.php?id=".$_GET["id"]);
}
else
{
$mysqlConnection = new PDO(
    'mysql:host=localhost;dbname=tp_php_sio;charset=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

// ordre de mission
$requete = $mysqlConnection->prepare('update atelier set titre = :titre where id =:id');
//execution de la requete
$requete->execute( ["id"=>$_GET["id"],"titre"=>$_POST["titre"]]);

$_SESSION["success"]="Atelier modifié avec succès";
   
header("location:list.php");
}
?>