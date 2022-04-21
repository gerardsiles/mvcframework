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
        <h2>Formulario: Editar un profesor</h2>

        <form
        action="<?=URLROOT;?>/teachers/update/<?=$data['teacher']->id_teacher?>"
         method="POST">
            <input type="text" placeholder="Nombre"
            name="name"
            value="<?php echo $data['teacher']->name ?>">
            <span class="invalidFeedback">
                <?=$data['nameError'];?>
            </span>

            <input type="text" placeholder="Apellido"
            name="surname"
            value="<?php echo $data['teacher']->surname ?>">
            <span class="invalidFeedback">
                <?=$data['surnameError'];?>
            </span>

            <input type="text" placeholder="Telefono"
            name="telephone"
            value="<?php echo $data['teacher']->telephone ?>">
            <span class="invalidFeedback">
                <?=$data['telephoneError'];?>
            </span>

            <input type="text" placeholder="NIF"
            name="nif"
            value="<?php echo $data['teacher']->nif ?>">
            <span class="invalidFeedback">
                <?=$data['nifError'];?>
            </span>

            <input type="text" placeholder="Email"
            name="email"
            value="<?php echo $data['teacher']->email ?>">
            <span class="invalidFeedback">
                <?=$data['emailError'];?>
            </span>

            <br>

            <label for="text">Tipo de usuario</label>
                 <select id="user_type" name="user_type">
                 <option value="teacher">Profesor</option>
                 </select>

            <br>


            <button id="submit" type="submit" value="submit">Actualizar profesor</button>


        </form>

        <div>
            <a href="<?=URLROOT;?>/courses/index"><input type="button" value="Volver"></a>
        </div>
    </div>

</div>




<div class="footer">
        <?php
require APPROOT . '/views/includes/footer.php';
?>
    </div>