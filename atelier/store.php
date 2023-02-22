<?php
session_start();
if (isset($_POST["titre"])==false || empty($_POST["titre"])){

    $_SESSION["error"]="Le titre est obligatoire";
    header("location:create.php");
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
$requete = $mysqlConnection->prepare('INSERT INTO atelier(titre) values(:titre)');
//execution de la requete
$requete->execute( ["titre"=>$_POST["titre"]]);

$_SESSION["success"]="Atelier crée avec succès";
   
header("location:list.php");
}
?>