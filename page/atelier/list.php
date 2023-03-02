<?php

if (isset($_SESSION["login"])){
    
    // déclaration de la constante
    define('NOMBRE_MAXIMUM',15) ;


    // création de le lien entre serv web et serv bd

    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM atelier a INNER JOIN categorie c on a.fk_categorie=c.id_categorie');
    //execution de la requete
    $requete->execute();

    $ateliers = $requete->fetchAll();
    $mysqlConnection = null;
    $requete = null;

    ?>
 
  <div class="row">
    <div class="col center">
    <a href="index.php?route=create-atelier"><button class="btn btn-primary">Créer</button></a>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Categorie</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($ateliers as $ligne){
            ?>
            <tr>
                <th scope="row"><?= $ligne["id_atelier"] ?></th>
                <td><?= $ligne["titre"]?></td>
                <td><?= $ligne["libelle"]?></td>
                <td>
                    <a href="index.php?route=delete-atelier&id=<?= $ligne["id_atelier"] ?>"><button class="btn btn-danger">Supprimer</button></a>
                    <a href="index.php?route=edit-atelier&id=<?= $ligne["id_atelier"] ?>"><button class="btn btn-info">Modifier</button></a>
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