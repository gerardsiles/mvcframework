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
  <h2>Cambio de nombre de usuario</h2>
  <form action="<?=URLROOT;?>/users/email" method="post">
    <div class="input-box">
      <label for="email">Modidifa el email</label>
      <input type="text" id="username" name="username" required>
      <div class="input-box">
        <button type="submit" class="btn-profile">Actualizar nombre</button>
      </div>
    </div>
  </form>
  </div>  
</div>