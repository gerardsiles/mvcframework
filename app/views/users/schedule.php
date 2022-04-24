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
       <table>
          <thead>
            <tr>
            <th>Nombre del curso</th>
            <th>Nombre de la clase</th>
            <th>Color de la clase</th>
            <th>Hora de inicio</th>
            <th>Hora de fin</th>
            </tr>
          </thead>

          <tbody>

            <?php foreach ($data['horarios'] as $horario): ?>
              <tr>

              <th><?=$horario->nombreCurso?></th>

              <td >
              <?=$horario->nombreClase?>
              </td>

              <td>
              <?=$horario->colorClase?>
              </td>

              <td>
              <?=$horario->horaInicio?>
              </td>

              <td>
              <?=$horario->horaFin?>
              </td>

              <?php endforeach;?>
              </tr>
          </tbody>
        </table>

  </div>
</div>