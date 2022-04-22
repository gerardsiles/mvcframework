<?php
  require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
  <?php
      require APPROOT . '/views/includes/navigation.php';
  ?>
</div>


<div class="container-profile">
  <div class="wrapper-profile">
  <h2>Perfil</h2>

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