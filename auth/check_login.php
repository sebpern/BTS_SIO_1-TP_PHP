<?php
$mysqlConnection = new PDO(
    'mysql:host=localhost;dbname=tp_php_sio;charset=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

// ordre de mission
$requete = $mysqlConnection->prepare('SELECT * FROM user where login = :login and password=:password');
//execution de la requete
$requete->execute( ["login"=>$_POST["login"],"password"=>sha1($_POST["password"])]);
session_start();
$user = $requete->fetch();
if ($user){
  
    $_SESSION["login"]=$_POST["login"];
  
}
else
{
    $_SESSION["error"]="identifiant de connexion incorrect";
   
}
header("location:../index.php");
?>