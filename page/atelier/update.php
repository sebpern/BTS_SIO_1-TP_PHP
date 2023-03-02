<?php
if (isset($_POST["titre"])==false || empty($_POST["titre"])){

    $_SESSION["error"]="Le titre est obligatoire";
    header("location:index.php?route=edit-atelier&id=".$_GET["id"]);
}
else
{
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

// ordre de mission
$requete = $mysqlConnection->prepare('update atelier set titre = :titre, fk_categorie=:fk_categorie where id_atelier =:id');
//execution de la requete
$requete->execute( ["id"=>$_GET["id"],"titre"=>$_POST["titre"],"fk_categorie"=>$_POST["categorie"]]);
$mysqlConnection = null;
$requete = null;
$_SESSION["success"]="Atelier modifié avec succès";
   
header("location:index.php?route=list-atelier");
}
?>