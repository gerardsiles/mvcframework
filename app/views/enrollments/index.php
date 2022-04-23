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
                            <th>Id_Enrollment</th>
                            <th>Id_Student</th>
                            <th>Id_Course</th>
                            <th>Status</th>

                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                        <tbody>

                        <?php foreach ($data['enrollments'] as $enrollment): ?>
                                    <tr>

                                        <th><?=$enrollment->id_enrollment;?></th>

                                        <td >
                                            <?=$enrollment->id;?>
                                        </td>

                                        <td>
                                            <?=$enrollment->id_course;?>
                                        </td>

                                        <td>
                                            <?=$enrollment->status;?>
                                        </td>


                                        <!--PENDIENTE CUANDO TENGA EL EDIT PREPARADO-->
                                        <td>
                                            <button class ='btn'>
                                           <a href="<?=URLROOT;?>/enrollments/update/<?=$enrollment->id_enrollment?>">
                                                Edit
                                            </button>
                                        </td>

                                        <!--PENDIENTE CUANDO TENGA EL DELETE PREPARADO-->
                                        <td>
                                                <form action="<?=URLROOT;?>/enrollments/delete/<?=$enrollment->id_enrollment?>" method="POST">
                                                    <input type="submit" name="delete" value="Delete" class="btn">
                                                </form>
                                        </td>
                                        <?php endforeach;?>
                                    </tr>
                        </tbody>
        </table>

        <div>

<a href="<?=URLROOT;?>/enrollments/addEnrollment"><input type="button" value="Crear una matriculacion"></a>

</div>
    </div>






<div class="footer">
    <?php
require APPROOT . '/views/includes/footer.php';
?>
</div>