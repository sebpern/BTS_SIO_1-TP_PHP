<?php

if (isset($_SESSION["login"])){
    ?>
      <div class="row">
        <div class="col center">
          <form action="index.php?route=store-categorie" method="post">
            <div class="form-group">
              <label for="libelle">Libelle</label>
              <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrer un libelle">
            </div>
            <div class="form-group">
              <label for="code">Code</label>
              <input type="text" class="form-control" id="code" name="code" placeholder="Entrer un code">
            </div>           
            <button type="submit" class="btn btn-primary">Créer</button>
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