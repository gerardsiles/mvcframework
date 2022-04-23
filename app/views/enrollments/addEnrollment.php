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
        <h2>Formulario: Crear una nueva matriculacion</h2>
        <form action="<?=URLROOT;?>/enrollments/addEnrollment" method="POST">


            <input type="number" placeholder="Id del estudiante" name="id">
            <span class="invalidFeedback">
                <?=$data['idError'];?>
            </span>


            <input type="number" placeholder="Id del curso" name="id_course">
            <span class="invalidFeedback">
                <?=$data['id_courseError'];?>
            </span>


            <br>

           <label for="number">Selecciona el estado de la matriculación.</label>
                 <select id="status" name="status">
                 <option value=0>No activo</option>
                 <option value=1>Activo</option>
                 </select>

            <br>


            <button id="submit" type="submit" value="submit">Crear matriculacion</button>


        </form>

        <div>
            <a href="<?=URLROOT;?>/enrollments/index"><input type="button" value="Volver"></a>
        </div>
    </div>

</div>




<div class="footer">
        <?php
require APPROOT . '/views/includes/footer.php';
?>
    </div>