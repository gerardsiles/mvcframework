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
        <h2>Formulario: Crear un nuevo profesor</h2>
        <form action="<?=URLROOT;?>/teachers/addTeacher" method="POST">
            <input type="text" placeholder="Nombre" name="name">
            <span class="invalidFeedback">
                <?=$data['nameError'];?>
            </span>

            <input type="text" placeholder="Apellido" name="surname">
            <span class="invalidFeedback">
                <?=$data['surnameError'];?>
            </span>

            <input type="text" placeholder="Telefono" name="telephone">
            <span class="invalidFeedback">
                <?=$data['telephoneError'];?>
            </span>

            <input type="text" placeholder="NIF" name="nif">
            <span class="invalidFeedback">
                <?=$data['nifError'];?>
            </span>


            <input type="text" placeholder="Email" name="email">
            <span class="invalidFeedback">
                <?=$data['emailError'];?>
            </span>

            <br>

           <label for="text">Tipo de usuario</label>
                 <select id="user_type" name="user_type">
                 <option value="teacher">Profesor</option>
                 </select>

            <br>


            <button id="submit" type="submit" value="submit">Crear profesor</button>


        </form>

        <div>
            <a href="<?=URLROOT;?>/teachers/index"><input type="button" value="Volver"></a>
        </div>
    </div>

</div>




<div class="footer">
        <?php
require APPROOT . '/views/includes/footer.php';
?>
    </div>