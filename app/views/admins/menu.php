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
                            <th>Id_User_Admin</th>
                            <th>UserName</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>Uer_Type</th>
                            <th>Password</th>

                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                        <tbody>
                        <?php foreach ($data['admins'] as $admin): ?>
                                    <tr>

                                        <th><?=$admin->id_user_admin;?></th>

                                        <td >
                                            <?=$admin->username;?>
                                        </td>

                                        <td>
                                            <?=$admin->name;?>
                                        </td>

                                        <td>
                                            <?=$admin->email;?>
                                        </td>

                                        <td>
                                            <?=$admin->user_type;?>
                                        </td>

                                        <td>
                                            <?=$admin->password;?>
                                        </td>



                                        <td>
                                        <!--PENDIENTE CUANDO TENGA EL EDIT PREPARADO-->

                                            <button class ='btn'>
                                           <a href="<?=URLROOT;?>/admins/update/<?=$admin->id_user_admin?>">
                                                Edit
                                            </button>
                                        </td>

                                        <!--PENDIENTE CUANDO TENGA EL DELETE PREPARADO-->
                                        <td>
                                                <form action="<?=URLROOT;?>/admins/delete/<?=$admin->id_user_admin?>" method="POST">
                                                    <input type="submit" name="delete" value="Delete" class="btn">
                                                </form>
                                        </td>
                                        <?php endforeach;?>
                                    </tr>
                        </tbody>
        </table>

        <div>

<a href="<?=URLROOT;?>/admins/addAdmin"><input type="button" value="Crear un user_admin"></a>

</div>
    </div>






<div class="footer">
    <?php
require APPROOT . '/views/includes/footer.php';
?>
</div>