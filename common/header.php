
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../assets/style.css" rel="stylesheet" >
  

    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TP PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
        if (isset($_SESSION["login"])){
        ?>
          <li class="nav-item">
            <a class="nav-link " href="../atelier/list.php">Lister</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="../auth/logout.php">Déconnexion</a>
          </li>
          <?php
        }
        ?>
      </ul>
</div>
  </div>
</nav>
<?php
if (isset($_SESSION["error"])){
  ?>
  <div class="alert alert-danger" role="alert">
    <?php 
      echo $_SESSION["error"];
      unset($_SESSION["error"]);
    ?>
  </div>

  <?php
 
}
if (isset($_SESSION["success"])){
  ?>
  <div class="alert alert-success" role="alert">
    <?php 
      echo $_SESSION["success"];
      unset($_SESSION["success"]);
    ?>
 
  </div>
  <?php
}
?>
<div class="container">
