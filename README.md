# Practica04---Mi-Agenda-Telefonica

## Generar informe de resultados.

### Diagrama E-R

![1](/ImagenesReadme/1.jpg?raw=true "Title")

El diagrama propuesto para la solución del problema consiste en dos tablas, la tabla USUARIOS contiene la información que corresponde a cada usuario que se registre en el sistema, incluyendo un rol que determina si es o no administrador permitiendo acceder a ciertas funcionalidades, y la tabla TELEFONOS que igualmente contiene la información correspondiente a los teléfonos y a su vez, por medio de una clave foránea, se conecta con la tabla Usuarios indicando una relación de pertenencia. Las dos tablas contienen información sobre la fecha de creación, fecha de modificación y si están o no eliminados.

### Nombre de la Base de Datos

La base de datos creada se llama practica4 y dentro de esta se encuentran las dos tablas con su respectiva estructura.

![1](/ImagenesReadme/2.jpg?raw=true "Title")

### Sentencias SQL de la estructura de la base de datos
#### Creación de la tabla usuario.

![1](/ImagenesReadme/3.jpg?raw=true "Title")

#### Creación de la tabla telefono.

![1](/ImagenesReadme/4.jpg?raw=true "Title")

### Desarrollo de los requerimientos
#### Agregar roles a la tabla usuario. Un usuario puede tener el rol de “admin” o “user”

![1](/ImagenesReadme/5.jpg?raw=true "Title")

Se creó la fila usu_rol que recibe un valor de tipo varchar con una longitud de 1, siendo enviado  “U” para usuarios normales y “A” para los usuarios que se determinen como administradores. Los usuarios administradores sólo pueden ser creados dentro de la base de datos y cada nuevo usuario, creado desde la interfaz, tendrá siempre el rol “U” sin opción a modificarse desde la interfaz.

#### Crear una tabla para almacenar los teléfonos de los usuarios

![1](/ImagenesReadme/6.jpg?raw=true "Title") 

Se crea la tabla correspondiente con el nombre telefono, se agrega el campo tel_id que genera el identificador correspondiente, tel_numero que recibe el número que corresponde al usuario, tel_operadora que recibe un valor de tipo varchar con el nombre de la operadora correspondiente, tel_tipo que recibe los valores de celular o convencional, las siguiente columnas representan los estados de cambio en los que se encuentra el teléfono ingresado, y por último el campo tel_usuario que será la clave foránea que lo relacione con el usuario correspondiente.
#### Los usuarios “anónimos” pueden registrarse en la aplicación a través de un formulario de creación de cuentas

![1](/ImagenesReadme/7.jpg?raw=true "Title") 

<b>Carpeta: public/controladores/crear_usuario.php</b>

![1](/ImagenesReadme/8.jpg?raw=true "Title")
![1](/ImagenesReadme/9.jpg?raw=true "Title")

Para la creación del usuario, se usa el formulario público donde se validan los datos con el uso de javascript y luego se envían al controlador de creación de usuario usando el método POST. Dentro del controlador se valida que tanto la cédula como el correo sean valores únicos y de esta forma pasa al nuevo query que ingresa los datos a la base, se debe tener en cuenta que cada nuevo usuario creado por interfaz se agrega con rol de “usuario”. En caso de no crearse se regresa a la página de crear usuario.
#### Los usuarios “anónimos” pueden listar los números de teléfono de un usuario usando su numero de cedula o correo electrónico

<b>Búsqueda por cédula</b>

![1](/ImagenesReadme/10.jpg?raw=true "Title")

<b>Busqueda por correo</b>

![1](/ImagenesReadme/11.jpg?raw=true "Title")

<b>Carpeta: public/javascript/listar_telefonos.js</b>

![1](/ImagenesReadme/12.jpg?raw=true "Title")

Este archivo controla las dos búsquedas por medio de funciones que se activan según el boton que se presione en la interfaz, se comprueba que al obtener el valor este no sea vacío y luego se activan las verificaciones correspondientes para el uso de AJAX, se envia la informacion usando el metodo GET. 
<br>
<b>Carpeta: public/controladores/listar_telefonos.php</b>

![1](/ImagenesReadme/13.jpg?raw=true "Title")
![1](/ImagenesReadme/14.jpg?raw=true "Title")

 
Para listar se obtiene la información y esta se usa para armar un query que obtenga los datos del usuario al que corresponde esa cédula o correo. Al confirmar el query correspondiente se procede a obtener los datos de los teléfonos que pertenecen a ese usuario, igualmente se formula un query que comprueba por el id del campo tel_usuario y esto se muestra usando una tabla.
#### Los usuarios “anónimos” podrá llamar o enviar un correo electrónico desde el sistema usando aplicaciones externas

![1](/ImagenesReadme/15.jpg?raw=true "Title") 

<b>Sentencias correspondientes dentro del controlador listar_telefonos.php</b>

![1](/ImagenesReadme/16.jpg?raw=true "Title") 
![1](/ImagenesReadme/17.jpg?raw=true "Title")

Al armar la tabla correspondiente de la búsqueda se indica el correo y los teléfonos con hipervínculos correspondientes, usando “tel:” y “mailto:”.
#### Un usuario puede iniciar sesión usando su correo y contraseña, y dependiendo del rol podrá:

![1](/ImagenesReadme/18.jpg?raw=true "Title")
![1](/ImagenesReadme/19.jpg?raw=true "Title") 

La página index del administrador recibe el identificador correspondiente al usuario que ingresa, con esto se trabajaran las diversas funcionalidades que tiene cada usuario. Posee cuatro botones para cada opción posible.
##### Los usuarios con rol de “admin” pueden: agregar, modificar, eliminar, buscar, listar y cambiar la contraseña de cualquier usuario de la base de datos.
<b>Agregar</b>

![1](/ImagenesReadme/20.jpg?raw=true "Title") 

<b>Carpeta: admin/controladores/admin/agregar_usuario.php</b>

![1](/ImagenesReadme/21.jpg?raw=true "Title")
![1](/ImagenesReadme/22.jpg?raw=true "Title") 

La función para agregar usuarios como administrador trabaja de similar manera al registro de usuario, esta consta de una verificación de los campos por javascript y al enviar la información al controlador se usa el método POST, asi mismo se usa un query de validacion de cedula y correo como campos únicos. Al final un último query que se encarga del ingreso de los datos a la base de datos.
<br>
<b>Modificar, Eliminar, Listar y Cambiar contraseña</b>

![1](/ImagenesReadme/23.jpg?raw=true "Title") 

Dentro de la interfaz se listan los usuarios existentes y no eliminados de la base de datos, cada uno con las opciones de modificar, eliminar y cambiar contraseña. Con esto se cumplen 4 funcionalidades dentro de una misma página que funciona con el uso de AJAX. Las opciones de modificar, eliminar y cambiar contraseña despliegan el formulario correspondiente y redirige la información según la función.
<br>
<b>Carpeta: admin/javascript/admin_modificar_usuario.js</b>
  
![1](/ImagenesReadme/24.jpg?raw=true "Title")  
![1](/ImagenesReadme/25.jpg?raw=true "Title")  
![1](/ImagenesReadme/26.jpg?raw=true "Title")  

Archivo javascript que permite el envío de información y validación para el correcto uso de AJAX, se comprueba que el campo enviado no este vacio y se redirige a los controladores usando el método GET. Este archivo trabaja para cada una de las opciones disponibles en la interfaz de modificar.

<b>Carpeta: admin/controladores/admin/editar_usuario.php, eliminar_usuario.php, cambiar_contrasena_usuario.php</b>

![1](/ImagenesReadme/27.jpg?raw=true "Title")
![1](/ImagenesReadme/28.jpg?raw=true "Title") 
![1](/ImagenesReadme/29.jpg?raw=true "Title") 

Estos controladores grafican el formulario para modificar, eliminar o cambiar contraseña, esto se asigna según la opción que se elija en la interfaz y se reenvie usando el archivo de javascript. Cada uno se carga por separado usando AJAX, además llaman a otro controlador para el ingreso de los datos modificados a la base de datos y otro que valide el correcto ingreso de la información.\

<b>Carpeta: admin/controladores/admin/bd_editar_usuario.php, bd_eliminar_usuario.php, bd_cambiar_contrasena_usuario.php</b>


![1](/ImagenesReadme/30.jpg?raw=true "Title") 
![1](/ImagenesReadme/31.jpg?raw=true "Title") 
![1](/ImagenesReadme/32.jpg?raw=true "Title") 
![1](/ImagenesReadme/33.jpg?raw=true "Title") 
![1](/ImagenesReadme/34.jpg?raw=true "Title")

La función de modificación trabaja de la misma manera según lo explicado anteriormente en los controladores de agregar usuarios y crear nuevas cuentas. Como verificación extra se comprueba que el correo nuevo que se ingresa no sea similar al anterior ni se repite con otros usuarios. Para el proceso de eliminar se muestran los datos correspondientes a ese usuario y se pide una confirmación, con esto se envía el identificador del usuario y con un primer query se eliminan los teléfonos que pertenecen a ese usuario y un segundo query que elimina al usuario respectivo. Como último proceso el cambio de contraseña sigue la misma idea para modificar, se muestra y se valida el ingreso de la nueva contraseña, igualmente se envía esto al controlador y se sube a la base de datos.
<br>
<b>Listar (Agenda)</b>

![1](/ImagenesReadme/35.jpg?raw=true "Title")

<b>Carpeta: admin/javascript/admin_agenda.js</b>

![1](/ImagenesReadme/36.jpg?raw=true "Title") 

Se implementa la función para listar y buscar usuarios de la base de datos, estos se pueden filtrar según la cédula y el correo permitiendo ver incluso los teléfonos que pertenecen a ese usuario. Se usa la misma configuración que para la búsqueda pública, con excepción de que se incluye una lista completa de usuarios.
##### Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la contraseña de su usuario.

![1](/ImagenesReadme/37.jpg?raw=true "Title") 
![1](/ImagenesReadme/38.jpg?raw=true "Title") 

<b>Modificar y Eliminar</b>

![1](/ImagenesReadme/39.jpg?raw=true "Title") 

<b>Carpeta: admin/controladores/usuario/modificar_info.php, eliminar_usuario.php</b>

![1](/ImagenesReadme/40.jpg?raw=true "Title") 
![1](/ImagenesReadme/41.jpg?raw=true "Title")

Dentro de la interfaz de usuario se tiene un acceso a un formulario de modificación donde se podrá actualizar los datos de su usuario, este bloquea la interacción con los campos de cédula y correo. El proceso para modificar es similar a los antes ya descritos, la nueva información ingresada se valida por medio de javascript y luego se envía al controlador respectivo que se encarga de cargarla a la base de datos. Para el proceso de eliminación, se usa el mismo formulario teniendo un botón que simplemente no comprueba el formulario, sino envía directamente el identificador del usuario y este se elimina de la base de datos, al realizar esta acción se cierra la sesión.
<br>
<b>Cambiar Contraseña</b>

![1](/ImagenesReadme/42.jpg?raw=true "Title")  

<b>Carpeta: admin/controladores/usuario/modificar_contra.php</b>

![1](/ImagenesReadme/43.jpg?raw=true "Title") 

El proceso de modificar la contraseña aplica una comprobación de la actual contraseña y una validación para que la nueva contraseña cumpla los requisitos de seguridad propuestos. Al confirmarse estos dos campos se maneja en el mismo controlador el ingreso a la base de datos.
##### Los usuarios con rol de “user” pueden agregar, modificar, eliminar, buscar y listar sus teléfonos.
<b>Agregar, Modificar, Eliminar, Buscar y Listar</b>

![1](/ImagenesReadme/44.jpg?raw=true "Title")   

Los procesos se incluyen dentro de una misma página nombrada Agenda, esta permite buscar los numeros de telefono del usuario y se incluyen ahí mismo la opcion de modificar o eliminar esos teléfonos, como segunda opción se agregar un pequeño formulario para agregar nuevos teléfonos y que se cargan en una tabla donde están todos los teléfonos que pertenecen a ese usuario. En el caso de la búsqueda y el listado se usa AJAX.

<b>Carpeta: admin/javascript/funciones_agenda.js</b>

![1](/ImagenesReadme/45.jpg?raw=true "Title") 
![1](/ImagenesReadme/46.jpg?raw=true "Title")
![1](/ImagenesReadme/47.jpg?raw=true "Title")
![1](/ImagenesReadme/48.jpg?raw=true "Title")

Para la funcionalidad de la página Agenda se trabaja con un archivo javascript que controla los procesos de búsqueda usando AJAX, incluido el listado de todos los telefonos existentes. Además maneja la validación para el campo de número al querer ingresar un nuevo teléfono esta actualización no se hace con AJAX.

<b>Carpeta: admin/controladores/usuario/agregar_telefono.php</b>

![1](/ImagenesReadme/49.jpg?raw=true "Title")

Para agregar un nuevo teléfono se usa la identificación del usuario, se valida el campo del número de teléfono y se envía la información usando un método POST, se guarda la nueva información y se carga con un query a la base de datos. 

<b>Carpeta: admin/controladores/usuario/modificar_telefono.php</b>

![1](/ImagenesReadme/50.jpg?raw=true "Title")

Como se explicó con anterioridad, para acceder a la opcion de modificacion primero se de buscar el teléfono por cualquiera de las tres formas posibles. Al seleccionar la opción se carga el formulario en una nueva página, este formulario maneja las mismas funcionalidades que los otros procesos de modificación, se validan los datos y se manda al controlador para ingresar a la base de datos.

<b>Carpeta: admin/controladores/usuario/eliminar_telefono.php</b>

![1](/ImagenesReadme/51.jpg?raw=true "Title") 

La opción de eliminar el teléfono trabaja de forma directa, se selecciona la opción y esta accede al controlador para mandar el query correspondiente a la eliminación, se devuelve la misma página cargada la nueva información.

<b>Carpeta: admin/controladores/usuario/buscar_telefonos.php</b>

![1](/ImagenesReadme/52.jpg?raw=true "Title")
![1](/ImagenesReadme/53.jpg?raw=true "Title")

Para la búsqueda de los teléfonos se obtienen los datos y se elige la opción correspondiente, se controla en el archivo javascript y manda la información según la búsqueda, al estar en el controlador se confirma la búsqueda y grafica la tabla con la información respectiva, incluyendo los enlaces para modificar y eliminar el telefono.

<b>Carpeta: admin/controladores/usuario/listar_telefonos.php</b>

![1](/ImagenesReadme/54.jpg?raw=true "Title")      

La impresión de los datos en la interfaz se realiza al cargar la página, esta función se manda directamente al AJAX. En el controlador recibe el identificador para graficar la tabla correspondiente.

#### Los datos siempre deberán ser validados cuando se trabaje a través de formularios.
Para cada formulario se implementó una validación correspondiente al caso, estas validaciones no fueron estructuradas según los requerimiento de administrador y usuario. Algunas se manejan junto con otras funciones de control como las  búsquedas y listados.

![1](/ImagenesReadme/55.jpg?raw=true "Title") 
![1](/ImagenesReadme/56.jpg?raw=true "Title") 

#### De igual manera, se pide manejar sesiones para que existe seguridad en el sistema de agenda telefónica. Por lo qué, debe existir una parte pública y una privada. Para lo cuál, se debe tener en cuenta:
##### Un usuario “anónimo”, es decir, un usuario que no ha iniciado sesión puede acceder únicamente a los archivos de la carpeta pública.

![1](/ImagenesReadme/57.jpg?raw=true "Title")

Según lo especificado en puntos anteriores se clasificó cada vista y controlador, en la parte pública se accede a la página de inicio general (index.html), inicio de sesión, creación de usuarios y la página de búsqueda por cédula o correo.
##### Un usuario con rol de “admin” puede acceder únicamente a los archivos de la carpeta admin → vista → admin; y admin → controladores → admin

![1](/ImagenesReadme/58.jpg?raw=true "Title")

Se trabajó específicamente con carpetas para cada parte, siendo las funciones diferenciadas según los requerimientos y manejadas dentro del código con los roles que se determinan para cada usuario. En base a la estructura no se permite el acceso de un usuario que no sea administrado.
##### Un usuario con rol de “user” puede acceder únicamente a los archivos de la carpeta admin → vista → user; y admin → controladores → user

![1](/ImagenesReadme/59.jpg?raw=true "Title")

En el caso de los usuarios no administradores se usó la misma lógica, se valida el rol con los identificadores al iniciar sesion y dentro de su propio perfil. En base a la estructura no se permite el acceso de un usuario que sea administrador. Aunque este puede obtener los datos de los usuarios y trabajar con ellos.
#### La parte pública (usuario anónimos) y privada (usuario registrado) ha sido descrita en los requisitos antes planteados. Se debe generar una página con la experiencia e interfaz de usuario apropiada, como la que se muestra a continuación: 

![1](/ImagenesReadme/60.jpg?raw=true "Title")
![1](/ImagenesReadme/61.jpg?raw=true "Title")
![1](/ImagenesReadme/62.jpg?raw=true "Title") 

Para la parte pública se reacomodo un diseño realizado en prácticas anteriores, desde aquí se tienen las opciones para iniciar sesión, crear un cuenta y buscar los contactos. El diseño tiene una funcionalidad simple sin redundar en otros procesos.
### La evidencia del correcto diseño de las páginas HTML usando CSS. Para lo cuál, se puede generar fotografías instantáneas (pantallazos).
<b>index.html</b>

![1](/ImagenesReadme/63.jpg?raw=true "Title") 

<b>login.html</b>

![1](/ImagenesReadme/64.jpg?raw=true "Title")

<b>crear_usuario.html</b>

![1](/ImagenesReadme/65.jpg?raw=true "Title")

<b>listar_telefonos.html</b>

![1](/ImagenesReadme/66.jpg?raw=true "Title") 

### La evidencia del correcto funcionamiento de cada uno de los puntos requeridos.
<b>Inicio de Sesión</b>

![1](/ImagenesReadme/67.jpg?raw=true "Title")

<b>Página Administrador</b>

![1](/ImagenesReadme/68.jpg?raw=true "Title") 
![1](/ImagenesReadme/69.jpg?raw=true "Title")
![1](/ImagenesReadme/70.jpg?raw=true "Title")
![1](/ImagenesReadme/71.jpg?raw=true "Title") 
![1](/ImagenesReadme/72.jpg?raw=true "Title")
![1](/ImagenesReadme/73.jpg?raw=true "Title")
![1](/ImagenesReadme/74.jpg?raw=true "Title")

<b>Página Usuario</b>

![1](/ImagenesReadme/75.jpg?raw=true "Title") 
![1](/ImagenesReadme/76.jpg?raw=true "Title")
![1](/ImagenesReadme/77.jpg?raw=true "Title")
![1](/ImagenesReadme/78.jpg?raw=true "Title") 
![1](/ImagenesReadme/79.jpg?raw=true "Title")
![1](/ImagenesReadme/80.jpg?raw=true "Title")
![1](/ImagenesReadme/81.jpg?raw=true "Title")
![1](/ImagenesReadme/82.jpg?raw=true "Title")

<b>Página Pública</b>

![1](/ImagenesReadme/83.jpg?raw=true "Title")
![1](/ImagenesReadme/84.jpg?raw=true "Title")

### Conclusiones
El diseño de páginas web necesita mantener de una estructura adecuada para que los diferentes usuarios se limiten a realizar cada función que se les permita ejecutar.

### Resultados Obtenidos
Diseñar una página web usando php, javascript, html y base de datos.
Se logró entender de mejor manera el funcionamiento de las páginas web.
Se implementó un diseño de agenda personal y pública con accesos restringidos.



