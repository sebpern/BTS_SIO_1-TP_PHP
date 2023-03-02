<?php
if (isset($_SESSION["login"])){
  $mysqlConnection = new PDO(
    'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
    USER,
    PASSWORD,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

  // ordre de mission
  $requete = $mysqlConnection->prepare('SELECT * FROM categorie where id_categorie =:id');
  //execution de la requete
  $requete->execute(["id"=>$_GET["id"]]);

  $categorie = $requete->fetch();
  $mysqlConnection = null;
  $requete = null;
    ?>
     <div class="row">
        <div class="col center">
          <form action="index.php?route=update-categorie&id=<?= $_GET["id"]?>" method="post">
          <div class="form-group">
              <label for="libelle">Libelle</label>
              <input type="text" class="form-control" id="libelle" name="libelle" value="<?= $categorie["libelle"]?>">
            </div>
            <div class="form-group">
              <label for="code">Code</label>
              <input type="text" class="form-control" id="code" name="code" value="<?= $categorie["code"]?>">
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