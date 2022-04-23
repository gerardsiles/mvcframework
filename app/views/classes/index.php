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
                            <th>Id_Class</th>
                            <th>Id_Teacher</th>
                            <th>Id_Course</th>
                            <th>Id_Schedule</th>
                            <th>Nombre</th>
                            <th>Color</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                        <tbody>

                        <?php foreach ($data['classes'] as $clase): ?>
                                    <tr>

                                        <th><?=$clase->id_class;?></th>

                                        <td >
                                            <?=$clase->id;?>
                                        </td>

                                        <td>
                                            <?=$clase->id_course;?>
                                        </td>

                                        <td>
                                            <?=$clase->id_schedule;?>
                                        </td>

                                        <td>
                                            <?=$clase->name;?>
                                        </td>

                                        <td>
                                            <?=$clase->color;?>
                                        </td>


                                        <!--PENDIENTE CUANDO TENGA EL EDIT PREPARADO-->
                                        <td>
                                            <button class ='btn'>
                                           <a href="<?=URLROOT;?>/classes/update/<?=$clase->id_class?>">
                                                Edit
                                            </button>
                                        </td>

                                        <!--PENDIENTE CUANDO TENGA EL DELETE PREPARADO-->
                                        <td>
                                                <form action="<?=URLROOT;?>/classes/delete/<?=$clase->id_class?>" method="POST">
                                                    <input type="submit" name="delete" value="Delete" class="btn">
                                                </form>
                                        </td>
                                        <?php endforeach;?>
                                    </tr>
                        </tbody>
        </table>

        <div>

<a href="<?=URLROOT;?>/classes/addClass"><input type="button" value="Crear una clase"></a>

</div>
    </div>






<div class="footer">
    <?php
require APPROOT . '/views/includes/footer.php';
?>
</div>