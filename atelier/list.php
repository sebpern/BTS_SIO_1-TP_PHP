<?php

if (isset($_SESSION["login"])){
    
    // déclaration de la constante
    define('NOMBRE_MAXIMUM',15) ;


    // création de le lien entre serv web et serv bd

    $mysqlConnection = new PDO(
        'mysql:host=localhost;dbname=tp_php_sio;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM atelier');
    //execution de la requete
    $requete->execute();

    $inscrits = $requete->fetchAll();


    ?>
 
  <div class="row">
    <div class="col center">
    <a href="index.php?route=create"><button class="btn btn-primary">Créer</button></a>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($inscrits as $ligne){
            ?>
            <tr>
                <th scope="row"><?= $ligne["id"] ?></th>
                <td><?= $ligne["titre"]?></td>
                <td>
                    <a href="index.php?route=delete&id=<?= $ligne["id"] ?>"><button class="btn btn-danger">Supprimer</button></a>
                    <a href="index.php?route=edit&id=<?= $ligne["id"] ?>"><button class="btn btn-info">Modifier</button></a>
                </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
    </table>
    <?php
    $requete=null;
    $mysqlConnection=null;
    ?>
  
    </div>
  </div>
   
        
    <?php

}
else
{
 
    $_SESSION["error"]="il faut être connecté pour avoir acces";
    header("location:index.php");
}
?>