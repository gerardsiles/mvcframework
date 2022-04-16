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
        <h2>Formulario: Crear un nuevo curso</h2>
        <form action="<?=URLROOT;?>/courses/addCourse" method="POST">
            <input type="text" placeholder="Nombre" name="name">
            <span class="invalidFeedback">
                <?=$data['nameError'];?>
            </span>

            <input type="text" placeholder="Descripcion" name="description">
            <span class="invalidFeedback">
                <?=$data['descriptionError'];?>
            </span>

            <input type="date" placeholder="Fecha de inicio de curso" name="date_start">
            <span class="invalidFeedback">
                <?=$data['date_startError'];?>
            </span>

            <input type="date" placeholder="Fecha de fin de curso" name="date_end">
            <span class="invalidFeedback">
                <?=$data['date_endError'];?>
            </span>

            <input type="number" placeholder="Activo" name="active">
            <span class="invalidFeedback">
                <?=$data['activeError'];?>
            </span>



            <button id="submit" type="submit" value="submit">Crear curso</button>

                    <div>
                    <p class="options">Volver al menu de cursos-><a href="<?=URLROOT?>/courses/index">Volver</p>
                    </div>
        </form>

    </div>


    <div class="footer">
        <?php
            require APPROOT . '/views/includes/footer.php';
        ?>
    </div>

</div>