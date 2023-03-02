<?php
if (isset($_SESSION["login"])){
  $mysqlConnection = new PDO(
    'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
    USER,
    PASSWORD,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

  // ordre de mission
  $requete = $mysqlConnection->prepare('SELECT * FROM atelier where id_atelier =:id');
  //execution de la requete
  $requete->execute(["id"=>$_GET["id"]]);

  $atelier = $requete->fetch();

  $requete = $mysqlConnection->prepare('SELECT * FROM categorie');
  //execution de la requete
  $requete->execute();

  $categories = $requete->fetchAll();
  $mysqlConnection = null;
  $requete = null;
    ?>
     <div class="row">
        <div class="col center">
          <form action="index.php?route=update-atelier&id=<?= $_GET["id"]?>" method="post">
            <div class="form-group">
              <label for="titre">Titre</label>
              <input type="text" class="form-control" id="titre" name="titre" value="<?= $atelier["titre"]?>"/>
            </div>
            <div class="form-group">
              <label for="categorie">Categorie</label>
              <select class="form-control" id="categorie" name="categorie" placeholder="Sélectionner une catégorie">
                  <?php
                  foreach ($categories as $ligne){
                      ?>
                      <option value="<?= $ligne["id_categorie"] ?>" <?php echo ($ligne["id_categorie"]==$atelier["fk_categorie"] ? "selected" : "") ?> ><?= $ligne["libelle"]?></option>
                  <?php
                  }
                  ?>
              </select>
            </div>             
            <button type="submit" class="btn btn-primary">Modifer</button>
          </form>

        </div>
      </div>

    <?php
}
else
{
    $_SESSION["error"]="il faut être connecté pour avoir acces";
    header("location:./index.php");
}
?>