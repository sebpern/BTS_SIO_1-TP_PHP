<?php

if (isset($_SESSION["login"])){
    
    // création de le lien entre serv web et serv bd

    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM categorie');
    //execution de la requete
    $requete->execute();

    $categories = $requete->fetchAll();

    $mysqlConnection = null;
    $requete = null;
    ?>
 
  <div class="row">
    <div class="col center">
    <a href="index.php?route=create-categorie"><button class="btn btn-primary">Créer</button></a>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle</th>
        <th scope="col">Code</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($categories as $ligne){
            ?>
            <tr>
                <th scope="row"><?= $ligne["id_categorie"] ?></th>
                <td><?= $ligne["libelle"]?></td>
                <td><?= $ligne["code"]?></td>
                <td>
                    <a href="index.php?route=delete-categorie&id=<?= $ligne["id_categorie"] ?>"><button class="btn btn-danger">Supprimer</button></a>
                    <a href="index.php?route=edit-categorie&id=<?= $ligne["id_categorie"] ?>"><button class="btn btn-info">Modifier</button></a>
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