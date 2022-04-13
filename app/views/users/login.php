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
        <h2>Inicia sesion</h2>
        <form action="<?=URLROOT;?>/users/login" method="POST">
            <input type="text" placeholder="Nombre de usuario" name="username">
            <span class="invalidFeedback">
                <!-- si el usuario introduce un nombre de usuario incorrecto
            informamos que el formato es erroneo -->
                <?=$data['usernameError'];?>
            </span>

            <input type="password" placeholder="Contrasena" name="password">
            <span class="invalidFeedback">
                <!-- si el usuario introduce un nombre de usuario incorrecto
            informamos que el formato es erroneo -->
                <?=$data['passwordError'];?>
            </span>

            <label for="user_type">Selecciona el tipo de usuario</label>
            <select id="user_type" name="user_type">
                <option value="student">estudiante</option>
                <option value="teacher">profesor</option>
                <option value="admin">administrador</option>
            </select>
            <span class="invalidFeedback">
                <!-- si el usuario introduce un tipo de usuario incorrecto
            informamos que lo revise -->
                <?=$data['userTypeError'];?>
            </span>

            <button id="submit" type="submit' value="submit">Iniciar sesion</button>
            <p class="options">Todavia no tienes una cuenta? <a href="<?=URLROOT;?>/users/register">registrate aqui</p>
        </form>
    </div>

</div>