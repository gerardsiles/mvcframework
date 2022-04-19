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
        <h2>Formulario: Editar un curso</h2>

        <form 
        action="<?=URLROOT;?>/courses/update/<?=$data['course']->id_course?>"
         method="POST">
            <input type="text" placeholder="Nombre" 
            name="name" 
            value="<?php echo $data['course']->name?>">
            <span class="invalidFeedback">
                <?=$data['nameError'];?>
            </span>

            <input type="text" placeholder="Descripcion" 
            name="description" 
            value="<?php echo $data['course']->description?>">
            <span class="invalidFeedback">
                <?=$data['descriptionError'];?>
            </span>

            <input type="date" placeholder="Fecha de inicio de curso" 
            name="date_start" 
            value="<?php echo $data['course']->date_start ?>"> 
            <span class="invalidFeedback">
                <?=$data['date_startError'];?>
            </span>

            <input type="date" placeholder="Fecha de fin de curso" 
            name="date_end" 
            value="<?php echo $data['course']->date_end ?>">
            <span class="invalidFeedback">
                <?=$data['date_endError'];?>
            </span>
            <br>

           <label for="number">Selecciona si está activo o no.</label>
                 <select id="active" 
                 name="active" 
                 value="<?php $data['course']->active ?>">
                 <option value=0>No activo</option>
                 <option value=1>Activo</option>
                 </select>

            <br>


            <button id="submit" type="submit" value="submit">Actualizar curso</button>


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