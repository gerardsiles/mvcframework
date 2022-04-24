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
      <form action="schedule" method="POST">
        <button type="submit" name="actualizar" value="dia" method="POST">Horarios de hoy</button>
        <button type="submit" name="actualizar" value="semana" method="POST">Horarios de la semana</button>
        <button type="submit" name="actualizar" value="mes" method="POST">Horarios del mes</button>
      </form>
      <span class="feedback">
          <!-- informar de la vista segun dia, semana y hora-->
          <?=$data['vista'];?>
      </span>
        <!-- echo informacion recibida -->
       <table>
          <thead>
            <tr>
            <th>Día de la clase</th>
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

              <th><?=$horario->diaClase?></th>

              <td >
              <?=$horario->nombreCurso?>
              </td>

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