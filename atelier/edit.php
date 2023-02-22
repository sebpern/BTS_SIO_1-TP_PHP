<?php
   session_start();
if (isset($_SESSION["login"])){
    include("../common/header.php");
    $mysqlConnection = new PDO(
      'mysql:host=localhost;dbname=tp_php_sio;charset=utf8',
      'root',
      '',
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
  );

  // ordre de mission
  $requete = $mysqlConnection->prepare('SELECT * FROM atelier where id =:id');
  //execution de la requete
  $requete->execute(["id"=>$_GET["id"]]);

  $atelier = $requete->fetch();
    ?>
     <div class="row">
        <div class="col center">
          <form action="update.php?id=<?= $_GET["id"]?>" method="post">
            <div class="form-group">
              <label for="titre">Titre</label>
              <input type="text" class="form-control" id="titre" name="titre" value="<?= $atelier["titre"]?>"/>
            </div>
            <button type="submit" class="btn btn-primary">Modifer</button>
          </form>

        </div>
      </div>

    <?php
    include("../common/footer.php");
}
else
{
    session_start();
    $_SESSION["error"]="il faut être connecté pour avoir acces";
    header("location:./index.php");
}
?>