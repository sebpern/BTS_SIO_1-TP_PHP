<?php
try{
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('DELETE FROM  categorie where id_categorie=:id');
    //execution de la requete
    $requete->execute( ["id"=>$_GET["id"]]);
    session_start();
    $_SESSION["success"]="Categorie supprimée avec succès";

}
catch (Exception $e) {
    if ($e->getCode() == 23000) {
        $_SESSION["error"]="Suppression impossible , la catégorie est reliée à un atelier";
    }
    else{
        $_SESSION["error"]="Erreur SQL";
    }
}
$mysqlConnection = null;
$requete = null; 
header("location:index.php?route=list-categorie");
?>