<?php
    require APPROOT . '/views/includes/head.php';
?>
<div class="navbar">
    <?php
        require APPROOT . '/views/includes/navigation.php';
    ?>
</div>


    <div>
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
                                            <button a href="<?=URLROOT;?>/courses/edit">Edit</button>
                                        </td>

                                        <td>
                                                <button a href="<?=URLROOT;?>/courses/edit">Delete</button>
                                        </td>
                                        <?php endforeach; ?>
                                    </tr>
                        </tbody>
        </table>
    </div>

<div>

<a href="<?=URLROOT;?>/courses/addCourse"><input type="button" value="Crear un curso"></a>

</div>

<!--
<div class="container">
    <?php foreach($data['courses'] as $course): ?>
        <div class="container-item">
            <h2>
                <?= $course->name; ?>
            </h2>
        </div>
    <?php endforeach; ?>
</div>-->




<div class="footer">
    <?php
        require APPROOT . '/views/includes/footer.php';
    ?>
</div>