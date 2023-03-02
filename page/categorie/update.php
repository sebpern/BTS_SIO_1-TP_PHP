<?php
if (isset($_POST["libelle"])==false || empty($_POST["libelle"]) || isset($_POST["code"])==false || empty($_POST["code"])){
    $_SESSION["error"]="Le titre et le code sont obligatoires";
    header("location:index.php?route=edit-categorie&id=".$_GET["id"]);
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
$requete = $mysqlConnection->prepare('update categorie set libelle = :libelle, code=:code where id_categorie =:id');
//execution de la requete
$requete->execute( ["id"=>$_GET["id"],"libelle"=>$_POST["libelle"],"code"=>$_POST["code"]]);
$mysqlConnection = null;
$requete = null;
$_SESSION["success"]="Catégorie modifiée avec succès";
   
header("location:index.php?route=list-categorie");
}
?>