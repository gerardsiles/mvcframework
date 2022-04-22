### Producto 2

- En nuestro servidor local, importar la base de datos proporcionada en formato SQL en nuestro PhpMyAdmin.
- Modificar nuestro archivo de conexión a la base de datos de php para poder conectarse correctamente.
  crear la conexion en Database.php[x]

- Se podrá modificar la base de datos añadiendo campos o tablas nuevas solamente si se quiere añadir alguna función adicional al proyecto, no para facilitar las funciones básicas.
  La propuesta de base de datos ofrecida, presenta varios problemas en la normalizacion de los datos y en la organizacion de la informacion. Tras contemplar varias opciones para solucionar
  este problema, hemos decidido quedarnos con la tabla students, renombrarla a users, y alli hemos agregado una columna que es user_type, con los valores de student, teacher y admin.

Esta decision se ha tomado basandonos en la homogeneidad de los datos, y un control sobre las operaciones sobre la misma base de datos asegurando la integridad de la misma.
las otras opciones contempladas, solo incrementaban la complejidad y los costes de la estructura, haciendo estas otras opciones las menos viables.

estos son los cambios generados en la base de datos:

```sql
ALTER TABLE students
RENAME TO users;
```

- FrontEnd: sitio web de contenido estático donde se presenta la aplicación y todas sus características junto con su funcionamiento.

- Registro-Login: sistemas de alta del usuario en el sistema y de acceso (una vez dado de alta) a la aplicación web. En los casos que no se pueda dar de alta o acceder, el sistema debe mostrar los mensajes de error correspondientes. Si no es un usuario administrador, seleccionar qué cursos o ciclos está inscrito.

registro de usuario[x] // Gerard <br>
login de usuario [x] // Gerard<br>
redireccionar al usuario[]<br>
menu usuario[]<br>
login de profesor[] // Gerard<br>
redireccionar al profesor[]<br>
Menu profesor[]<br>
login de admin[]<br>
redireccionar al admin[]<br>
menu usuario[]<br>
logout[x] // gerard<br>

- Panel administración: una vez se accede como administrador, tendrá acceso al Panel Administración donde podrá crear nuevas asignaturas y cursos y configurar nuevas asignaturas en el horario. En este apartado se podrá configurar el día y hora de las clases, el color, junto con el profesor que la imparte y el curso al que pertenece. Se dará la opción de poder añadir, modificar y eliminar profesores, clases y cursos.

pagina administracion[] // Iago<br>
mostrar datos mysql[] // Iago<br>
agregar datos[] // Iago<br>
modificar datos[] // Iago<br>
eliminar datos[] //Iago<br>

- Panel principal: una vez el usuario ha accedido correctamente a travésdel login, podrá ver un horario con las diferentes clases. Posibilidad de mostrar vista por semana, por dia y por mes. Cada usuario solo tendrá la opción de ver el calendario de los cursos que está impartiendo.

pagina horarios[]<br>
diferentes vistas[]<br>

- Perfil: sistema de configuración del usuario: modificación del nombre de usuario, correo electrónico y contraseña.
  pagina de perfil[]<br>
  modificacion del nombre[]<br>
  modificacion correo electronico[]<br>
  modificacion contrasena[]<br>

### Rubrica

- Bases de datos

  - Se ha importado correctamente la base de datos y la conexión también es satisfactoria. Además se ha añadido alguna tabla correctamente para tener más funcionalidades.

  Hemos agregado un campo a las tablas de students, teachers y users_admins con el valor user_type. Esto lo usamos para guardar que tipo de usuario ha hecho el login, y luego mostrar un menu con diferentes funcionalidades dependiendo del tipo de usuario que haya iniciado sesion en la aplicacion.

```sql
ALTER TABLE `users` ADD `user_type` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'student' AFTER `email`;


```

- FrontEnd
  - Presenta la aplicación y las características, con su funcionamiento y un diseño muy atractivo y visual.
- Registro-Login

  - El registro y el login funcionan correctamente y da los mensajes de error pertinentes.

  El acceso a la base de datos es correcto, y la insercion y recoleccion de datos del usuario funcionan correctamente. Ademas, hemos implementeado en el modelo el mostrar los errores pertinentes en cada situacion.

  En el caso del login, para evitar el uso mailicioso de conseguir usuarios o contrasenas, solamente informamos que el usuario o la contrasena es incorrecto

  ```php
    if (empty($data['username'])) {
    $data['usernameError'] = 'Usuario o contrasena incorrecto';
    }

    if (empty($data['password'])) {
        $data['passwordError'] = 'Usuario o contrasena incorrecto';
    }
  ```

  Ademas, los datos recibidos son filtrados y limpiados para evitar las inyecciones SQL

  ```php
   // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  ```

  Podemos ver otro ejemplo en el registro del usuario, mostrando los errores pertinentes de cada campo necesario:

  ```php
    if(empty($data['password'])){
    $data['passwordError'] = 'introduzca una contrasena';
    } elseif(strlen($data['password']) < 6){
    $data['passwordError'] = 'la contrasena debe ser minimo de 8 caracteres';
    } elseif (preg_match($passwordValidation, $data['password'])) {
    $data['passwordError'] = 'la contrasena debe tener como minimo un valor numerico';
    }
  ```

  Tambien podemos ver el uso de regex para validar los campos del nombre de usuario y la contrasena:

  ```php
    $nameValidation = "/^[a-zA-Z]*$/";
    $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
  ```

- Panel de administracion
  - Se accede al panel y crear nuevas asignaturas y cursos. Se puede configurar el día, hora, color y profesor que la imparte. Además se añade, modifica y elimina profesores, clases y cursos.
- Perfil
  - El usuario puede ver sólo los horarios de los cursos que está impartiendo y puede elegir la vista semanal, mensual o diaria.
- GIT
  - Se ha hecho la instalación y se ha creado un nuevo repositorio, poder hacer el checkout y registrar los cambios además de enviar los cambios al repositorio remoto y actualizar el repositorio local.
