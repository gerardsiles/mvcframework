<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/index">Home</a>
        </li>
        <li>
            <!-- comprobar si la sesion es de admin para mostrar su enlace -->
            <?php if(isset($_SESSION['user_type'])) : ?>
                <?php if($_SESSION['user_type'] == 'admin') : ?>
                    <a href="<?= URLROOT; ?>/admins/index">Administracion</a>
                <?php endif; ?> 
            <?php endif; ?>
        </li>
        <li>
            <?php if(isset($_SESSION['user_type'])) : ?>
                <?php if($_SESSION['user_type'] == 'student' || $_SESSION['user_type'] == 'teacher') : ?>
                    <a href="<?= URLROOT; ?>/users/schedule">Horarios</a>
                <?php endif; ?>
            <?php endif; ?>
        </li>
        <li>
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="<?= URLROOT; ?>/users/index">Perfil</a>
            <?php endif; ?>
        </li>
        <li class="btn-login">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?=URLROOT;?>/users/logout">Log out</a>
            <?php else: ?>
                <a href="<?=URLROOT;?>/users/login">Login</a>
            <?php endif;?>
        </li>
    </ul>
</nav>