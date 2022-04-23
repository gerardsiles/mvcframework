<?php
require APPROOT . '/views/includes/head.php';
?>
<div class="navbar">
    <?php
require APPROOT . '/views/includes/navigation.php';
?>
</div>


<div class="container-login">
    <div class="wrapper-login">
        <h2>Formulario: Editar un horario</h2>

        <form
        action="<?=URLROOT;?>/schedules/update/<?=$data['schedule']->id_schedule?>"
         method="POST">
            <input type="number" placeholder="Id de la clase"
            name="id_class"
            value="<?php echo $data['schedule']->id_class ?>">
            <span class="invalidFeedback">
                <?=$data['id_classError'];?>
            </span>

            <input type="time" placeholder="Hora de inicio"
            name="time_start"
            value="<?php echo $data['schedule']->time_start ?>">
            <span class="invalidFeedback">
                <?=$data['time_startError'];?>
            </span>

            <input type="time" placeholder="Hora de fin"
            name="time_end"
            value="<?php echo $data['schedule']->time_end ?>">
            <span class="invalidFeedback">
                <?=$data['time_endError'];?>
            </span>

            <input type="date" placeholder="Dia del horario de la clase"
            name="day"
            value="<?php echo $data['schedule']->day ?>">
            <span class="invalidFeedback">
                <?=$data['dayError'];?>
            </span>




 


            <button id="submit" type="submit" value="submit">Actualizar clase</button>


        </form>

        <div>
            <a href="<?=URLROOT;?>/classes/index"><input type="button" value="Volver"></a>
        </div>
    </div>

</div>




<div class="footer">
        <?php
require APPROOT . '/views/includes/footer.php';
?>
    </div>