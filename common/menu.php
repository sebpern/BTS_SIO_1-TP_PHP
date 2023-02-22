<div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
        if (isset($_SESSION["login"])){
        ?>
          <li class="nav-item">
            <a class="nav-link " href="./atelier/list.php">Lister</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="./auth/logout.php">Déconnexion</a>
          </li>
          <?php
        }
        ?>
      </ul>
</div>