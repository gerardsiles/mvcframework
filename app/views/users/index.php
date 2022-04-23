<?php
  require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
  <?php
      require APPROOT . '/views/includes/navigation.php';
  ?>
</div>


<div class="cabecera"> <h1>Perfil - usuario:</h1> 
<div> <?=$_SESSION['username'] . ", email: " . $_SESSION['email'];?></div>
</div>

<div class="container-profile">
  
  <div class="wrapper-profile" style="margin: auto; display: grid; grid-template-columns: auto auto auto; align-items: start; justify-content: safe center;">
  

    <div class="card" style=" width: 18rem; ">
      <div class="card-body">
          <h4 class="card-title">Nombre de usuario</h4>
          <p class="card-text">Cambia tu nombre de usuario</p>
          <button class ='btn'>
          <a href="<?=URLROOT;?>/users/username">Editar</a>
          </button>
      </div>
    </div>

    <div class="card" style=" width: 18rem; ">
      <div class="card-body">
          <h4 class="card-title">Email</h4>
          <p class="card-text">Cambia tu email</p>
          <button class ='btn'>
          <a href="<?=URLROOT;?>/users/email">Editar</a>
          </button>
      </div>
    </div>

    <div class="card" style=" width: 18rem; ">
      <div class="card-body">
          <h4 class="card-title">Contrasena</h4>
          <p class="card-text">Cambia tu constrasena</p>
          <button class ='btn'>
          <a href="<?=URLROOT;?>/users/password">Editar</a>
          </button>
      </div>
    </div>
  </div>
</div>