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
                            <th>Id_Course</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date_start</th>
                            <th>Date_end</th>
                            <th>Active</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                        <tbody>
                        <?php foreach($data['courses'] as $course): ?>
                                    <tr>

                                        <th><?= $course->id_course; ?></th>

                                        <td >
                                            <?= $course->name; ?>
                                        </td>

                                        <td>
                                            <?= $course->description; ?>
                                        </td>

                                        <td>
                                            <?= $course->date_start; ?>
                                        </td>

                                        <td>
                                            <?= $course->date_end; ?>
                                        </td>

                                        <td>
                                            <?= $course->active; ?>
                                        </td>

                                        <td>
                                        <!--PENDIENTE CUANDO TENGA EL EDIT PREPARADO-->
                                             
                                            <a class="btn"
                                            href="<?=URLROOT;?>/courses/update/<?=$course->id_course?>">
                                                Edit
                                            </a>
                                        </td>

                                        <!--PENDIENTE CUANDO TENGA EL DELETE PREPARADO-->
                                        <td>
                                                <form action="<?=URLROOT;?>/courses/delete/<?=$course->id_course?>" method="POST">
                                                    <input type="submit" name="delete" value="Delete" class="btn">
                                                </form>
                                        </td>
                                        <?php endforeach; ?>
                                    </tr>
                        </tbody>
        </table>
                
        <div>

<a href="<?=URLROOT;?>/courses/addCourse"><input type="button" value="Crear un curso"></a>

</div>
    </div>






<div class="footer">
    <?php
        require APPROOT . '/views/includes/footer.php';
    ?>
</div>