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
  <h2>Cambio de contrasena</h2>
  <form action="<?=URLROOT;?>/users/password" method="POST">
    <div class="input-box">
      <label for="username">Modifica la contrasena</label>
      <input type="text" id="newPassword" name="newPassword" placeholder="nueva contrasena" required>
        <span class="invalidFeedback">
          <?=$data['usernameError'];?>
        </span>
      <div class="input-box">
        <button type="submit" class="btn-profile">Actualizar</button>
      </div>
    </div>
  </form>