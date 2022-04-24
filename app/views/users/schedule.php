<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
require APPROOT . '/views/includes/navigation.php';
?>
</div>

<div class="container-schedule">
  <div class="wrapper-schedule">
    <div>
       <h3>Horarios de clases</h3>
        <button type="submit" name="dia" value="POST" method="POST">Horarios de hoy</button>
        <button type="submit" name="semana" value="POST" method="POST">Horarios de la semana</button>
        <button type="submit" name="mes" value="POST" method="POST">Horarios del mes</button>
       <!-- echo informacion recibida -->
       <?php foreach($data['horarios'] as $horario): ?>
        <div class="container-schedule">
          <p><?= $horario->nombreCurso ?><p>
          <p><?= $horario->nombreClase ?><p>
          <p><?= $horario->colorClase ?><p>
          <p><?= $horario->horaInicio ?><p>
          <p><?= $horario->horaFin ?><p>

        </div>
       <?php endforeach; ?>
    </div>
  </div>
</div>