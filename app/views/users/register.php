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
        <h2>Registrate</h2>
        // redirigir la accion de la pagina
        <form action="<?=URLROOT;?>/users/register" method="POST">
            <input type="text" placeholder="Nombre de usuario" name="username">
            <span class="invalidFeedback">
                <!-- si el usuario introduce un nombre de usuario incorrecto
            informamos que el formato es erroneo -->
                <?=$data['usernameError'];?>
            </span>

            <input type="email" placeholder="email" name="email">
            <span class="invalidFeedback">
                <!-- si el usuario introduce un nombre de usuario incorrecto
            informamos que el formato es erroneo -->
                <?=$data['emailError'];?>
            </span>

            <input type="password" placeholder="Contrasena" name="password">
            <span class="invalidFeedback">
                <!-- si el usuario introduce un nombre de usuario incorrecto
            informamos que el formato es erroneo -->
                <?=$data['passwordError'];?>
            </span>

            <input type="password" placeholder="Confirmar contrasena" name="confirmPassword">
            <span class="invalidFeedback">
                <!-- si el usuario introduce un nombre de usuario incorrecto
            informamos que el formato es erroneo -->
                <?=$data['confirmPasswordError'];?>
            </span>

            <button id="submit" type="submit' value="submit">Iniciar sesion</button>
            <p class="options">tienes una cuenta? <a href="<?=URLROOT?>/users/login">inicia sesion aqui</p>
        </form>
    </div>

</div>