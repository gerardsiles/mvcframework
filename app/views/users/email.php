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
    <h2>Modifica tu email</h2>
    <form action="<?=URLROOT;?>/users/email" method="post">
      <div class="input-box">
        <label for="email">Modifica el email</label>
        <input type="text" id="newEmail" name="newEmail" autocomplete="off">
        <div class="input-box">
        <span class="invalidFeedback">
          <?=$data['emailError'];?>
        </span>
        <span class="validFeedback">
          <?=$data['emailSuccess'];?>
        </span>
        </div>
        <button type="submit" class="btn-profile">Actualizar nombre</button>
      </div>
    </form>
    </div>  
  </div>

