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
                            <th>Id_Teacher</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Telephone</th>
                            <th>NIF</th>
                            <th>Email</th>
                            <th>User_type</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                        <tbody>
                        <?php foreach ($data['teachers'] as $teacher): ?>
                                    <tr>

                                        <th><?=$teacher->id_teacher;?></th>

                                        <td >
                                            <?=$teacher->name;?>
                                        </td>

                                        <td>
                                            <?=$teacher->surname;?>
                                        </td>

                                        <td>
                                            <?=$teacher->telephone;?>
                                        </td>

                                        <td>
                                            <?=$teacher->nif;?>
                                        </td>

                                        <td>
                                            <?=$teacher->email;?>
                                        </td>

                                        <td>
                                            <?=$teacher->user_type;?>
                                        </td>

                                        <td>
                                        <!--PENDIENTE CUANDO TENGA EL EDIT PREPARADO-->

                                            <button class ='btn'>
                                           <a href="<?=URLROOT;?>/teachers/update/<?=$teacher->id_teacher?>">
                                                Edit
                                            </button>
                                        </td>

                                        <!--PENDIENTE CUANDO TENGA EL DELETE PREPARADO-->
                                        <td>
                                                <form action="<?=URLROOT;?>/teachers/delete/<?=$teacher->id_teacher?>" method="POST">
                                                    <input type="submit" name="delete" value="Delete" class="btn">
                                                </form>
                                        </td>
                                        <?php endforeach;?>
                                    </tr>
                        </tbody>
        </table>

        <div>

<a href="<?=URLROOT;?>/teachers/addTeacher"><input type="button" value="Crear un profesor"></a>

</div>
    </div>






<div class="footer">
    <?php
require APPROOT . '/views/includes/footer.php';
?>
</div>