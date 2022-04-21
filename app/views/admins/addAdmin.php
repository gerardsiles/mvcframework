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
        <h2>Formulario: Crear un nuevo administrador</h2>
        <form action="<?=URLROOT;?>/admins/addAdmin" method="POST">
            <input type="text" placeholder="Username" name="username">
            <span class="invalidFeedback">
                <?=$data['usernameError'];?>
            </span>

            <input type="text" placeholder="Nombre" name="name">
            <span class="invalidFeedback">
                <?=$data['nameError'];?>
            </span>

            <input type="text" placeholder="Email" name="email">
            <span class="invalidFeedback">
                <?=$data['emailError'];?>
            </span>

            <br>

            <label for="text">Tipo de usuario</label>
                 <select id="user_type" name="user_type">
                 <option value="admin">Admin</option>
                 </select>

            <br>

            <input type="text" placeholder="Password" name="password">
            <span class="invalidFeedback">
                <?=$data['passwordError'];?>
            </span>


            <button id="submit" type="submit" value="submit">Crear administrador</button>


        </form>

        <div>
            <a href="<?=URLROOT;?>/admins/menu"><input type="button" value="Volver"></a>
        </div>
    </div>

</div>




<div class="footer">
        <?php
require APPROOT . '/views/includes/footer.php';
?>
    </div>