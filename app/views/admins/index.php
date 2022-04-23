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
        <div class="box" style="margin: 5em; display: grid; grid-template-columns: auto auto auto auto auto auto auto; align-items: start; justify-content: space-between;">

                    <div class="card" style=" width: 18rem; ">
                        <div class="card-body">
                            <h5 class="card-title">Cursos</h5>
                            <p class="card-text">Gestiona los cursos</p>

                            <button class ='btn'>
                            <a href="<?=URLROOT;?>/courses/index">Entrar</a>
                            </button>

                        </div>
                    </div>

                    <div class="card" style=" width: 18rem; ">
                        <div class="card-body">
                            <h5 class="card-title">Profesores</h5>
                            <p class="card-text">Gestiona los profesores</p>

                            <button class ='btn'>
                            <a href="<?=URLROOT;?>/teachers/index">Entrar</a>
                            </button>

                        </div>
                    </div>

                    <div class="card" style=" width: 18rem; ">
                        <div class="card-body">
                            <h5 class="card-title">Horarios</h5>
                            <p class="card-text">Gestiona los horarios</p>

                            <button class ='btn'>
                            <a href="<?=URLROOT;?>/schedules/index">Entrar</a>
                            </button>

                        </div>
                    </div>


        </div>
    </div>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <div class="box" style="margin: 5em; display: grid; grid-template-columns: auto auto auto auto auto auto auto; align-items: start; justify-content: space-between;">
            
            <div class="card" style=" width: 18rem; ">
                                <div class="card-body">
                                    <h5 class="card-title">Clases</h5>
                                    <p class="card-text">Gestiona las clases</p>

                                    <button class ='btn'>
                                    <a href="<?=URLROOT;?>/classes/index">Entrar</a>
                                    </button>

                                </div>
            </div>          
            <div class="card" style=" width: 18rem; ">
                                <div class="card-body">
                                    <h5 class="card-title">Matriculaciones</h5>
                                    <p class="card-text">Gestiona las matriculaciones</p>

                                    <button class ='btn'>
                                    <a href="<?=URLROOT;?>/enrollments/index">Entrar</a>
                                    </button>

                                </div>
            </div>
        </div>
    </div>
</div>



<div class="footer">
    <?php
require APPROOT . '/views/includes/footer.php';
?>
</div>