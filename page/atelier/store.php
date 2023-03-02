<?php
if (isset($_POST["titre"])==false || empty($_POST["titre"]) || isset($_POST["categorie"])==false || empty($_POST["categorie"])){

    $_SESSION["error"]="Le titre et la categorie sont obligatoires";
    header("location:index.php?route=create-atelier");
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
$requete = $mysqlConnection->prepare('INSERT INTO atelier(titre,fk_categorie) values(:titre,:fk_categorie)');
//execution de la requete
$requete->execute( ["titre"=>$_POST["titre"],"fk_categorie"=>$_POST["categorie"]]);
$mysqlConnection = null;
$requete = null;
$_SESSION["success"]="Atelier crée avec succès";
   
header("location:index.php?route=list-atelier");
}
?>