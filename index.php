<?php    session_start();?>
<html>
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link href="assets/style.css" rel="stylesheet" >
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
                <a class="nav-link " href="index.php?route=list-atelier">Lister atelier</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="index.php?route=list-categorie">Lister categorie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="index.php?route=logout">Déconnexion</a>
              </li>
              <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
<?php
include("config/database.php");
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
  <div class="row">
    <div class="col center">
      <?php
      
    if(isset($_GET["route"])){

              
          switch ($_GET["route"]){
            case "login":
              include("page/auth/login.php");
              break;
            case "check_login":
            include("page/auth/check_login.php");
              break;  
            case "logout":
                include("page/auth/logout.php");
                break;                        
            case "list-atelier":
                include("page/atelier/list.php");
                break;
            case "create-atelier":
                include("page/atelier/create.php");
                break;
            case "store-atelier":
              include("page/atelier/store.php");
              break; 
            case "delete-atelier":
                include("page/atelier/delete.php");
                break; 
            case "edit-atelier":
                  include("page/atelier/edit.php");
                  break;
            case "update-atelier":
                include("page/atelier/update.php");
                break;  
            case "list-categorie":
                include("page/categorie/list.php");
                break;
            case "create-categorie":
                include("page/categorie/create.php");
                break;
            case "store-categorie":
              include("page/categorie/store.php");
              break; 
            case "delete-categorie":
                include("page/categorie/delete.php");
                break; 
            case "edit-categorie":
                  include("page/categorie/edit.php");
                  break;
            case "update-categorie":
                include("page/categorie/update.php");
                break;                                            
            default : 
            if(isset($_SESSION["login"])){
              echo "quelle belle correction";
            }else{
              include("page/auth/login.php");
            }
          }
        }
        else{
          if(isset($_SESSION["login"])){
            echo "quelle belle correction";
          }else{
            include("page/auth/login.php");
          }
        }

      ?>
    </div>
  </div>
</div>
       
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html> 


