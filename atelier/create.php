<?php
   session_start();
if (isset($_SESSION["login"])){
    include("../common/header.php");
    ?>
      <div class="row">
        <div class="col center">
          <form action="store.php" method="post">
            <div class="form-group">
              <label for="titre">Titre</label>
              <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrer un titre">
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
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