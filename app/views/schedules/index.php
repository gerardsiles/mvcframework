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
        <table>
                    <thead>
                        <tr>
                            <th>Id_Schedule</th>
                            <th>Id_Class</th>
                            <th>Hora de inicio</th>
                            <th>Hora de fin</th>
                            <th>Dia</th>

                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                        <tbody>

                        <?php foreach ($data['schedules'] as $schedule): ?>
                                    <tr>

                                        <th><?=$schedule->id_schedule;?></th>

                                        <td >
                                            <?=$schedule->id_class;?>
                                        </td>

                                        <td>
                                            <?=$schedule->time_start;?>
                                        </td>

                                        <td>
                                            <?=$schedule->time_end;?>
                                        </td>

                                        <td>
                                            <?=$schedule->day;?>
                                        </td>


                                        <!--PENDIENTE CUANDO TENGA EL EDIT PREPARADO-->
                                        <td>
                                            <button class ='btn'>
                                           <a href="<?=URLROOT;?>/schedules/update/<?=$schedule->id_schedule?>">
                                                Edit
                                            </button>
                                        </td>

                                        <!--PENDIENTE CUANDO TENGA EL DELETE PREPARADO-->
                                        <td>
                                                <form action="<?=URLROOT;?>/schedules/delete/<?=$schedule->id_schedule?>" method="POST">
                                                    <input type="submit" name="delete" value="Delete" class="btn">
                                                </form>
                                        </td>
                                        <?php endforeach;?>
                                    </tr>
                        </tbody>
        </table>

        <div>

<a href="<?=URLROOT;?>/enrollments/addEnrollment"><input class="button" type="button" value="Crear una matriculacion"></a>

</div>
    </div>






<div class="footer">
    <?php
require APPROOT . '/views/includes/footer.php';
?>
</div>