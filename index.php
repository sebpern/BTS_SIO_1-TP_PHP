

<?php
   session_start();

include("common/header.php");
?>
<div class="row">
  <div class="col center">
    <?php
    if (isset($_SESSION["login"])){
    ?>
        Voici enfin une belle correction
    <?php
    }
    else{
      include('auth/login.php');
    }
    ?>
  </div>
</div>
<?php
include("common/footer.php");
?>


