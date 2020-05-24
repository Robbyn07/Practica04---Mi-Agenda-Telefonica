<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Pagina Inicial</title>
    <link rel="stylesheet" type="text/css" href="../../css/admin/diseno_index.css">
</head>

<body>
    <header>
        <h1>Agenda Personal</h1>
        <img id="logo_principal" src="../../contenido/logo_ups.png" alt="logo">
        <input id="fieldset_busqueda" type="text" placeholder="Agrege lo que desea buscar">

        <div class="iconos">
            <img src="../../contenido/icono_usuario.png">
            <span>Perfil</span>
        </div>

        <div class="iconos">
            <img src="../../contenido/icono_mensaje.png">
            <span>Contactos</span>
        </div>

        <div class="iconos">
            <img src="../../contenido/icono_mas.png">
            <span>Agregar</span>
        </div>

    </header>

    <div class="jump"></div>

    <nav class="navegacion_principal">
        <ul>
            <li><a href="">Perfil</a></li>
            <li><a href="">Contactos</a></li>
            <li><a href="">Actividad Turistica</a></li>
            <li><a href="">Contacto</a></li>
        </ul>
    </nav>

    <div class="jump"></div>

    <section id="informacion">
        <h5>texto vacio</h5>

        <article id="general">
            <h3>Informacion</h3>
            
            <p>
                Esta pagina se muestra como una de inicio para el acceso a todos los usuarios. Desde aqui se puede buscar acceder al inicio de sesion, busqueda 
                y lista de contactos referentes a una persona. 
            </p>  

            <div id="buttons">
              <input type="button" value="Ir a Google">
              <input type="button" value="Ir a Bing">
            </div>
        </article>

        <aside id="img_general">
          <img src="../../contenido/mensajeria_social.jpg" alt="agenda"/><br>
          <span></span>
        </aside>
    </section>
  
    <div class="jump"></div>

    <section  id="galeria">
      <h2>Galeria</h2>

      <aside>
        <img src="../Images/html_poblacion/reinas_zamora.jpg" alt="reinas" width="350" height="200">
      </aside>
    </section>

    <div>
      <div>
        <img id="autor" src="../Images/html_index/cuy_autor.jpeg" alt="autor" width="200" height="200">

        <aside>
          <img src="../Images/icons/icono_estrella_blanca2.png" alt="estrella1" width="20" height="20"> 
          <img src="../Images/icons/icono_estrella_blanca1.png" alt="estrella1" width="20" height="20"> 
          <img src="../Images/icons/icono_estrella_blanca1.png" alt="estrella1" width="20" height="20">
        </aside>
      </div>

      <article>
        <h3>Comentario</h3>
        
        <p>

        </p>
      </article>
    </div>

    <section>
      <h2>Equipo</h2>

      <div>
        <img class="filter" src="../Images/html_index/juan_filtro.jpg" alt="juan carlos" width="180" height="180"><br>
        <span class="image_description">Pablo Loja.</span>
      </div>

      <div>
        <img class="filter" src="../Images/html_index/floro_filtro.jpg" alt="florencio" width="180" height="180"><br>
        <span class="image_description">Robbyn Reyes.</span>
      </div>
    </section>

    <footer>
      <fieldset>
        <legend>Redes Sociales</legend>

        <a href="https://www.facebook.com/Rakrad7101/"><img src="../Images/icons/icono_facebook.png" alt="facebook"></a>
        <a href="https://www.instagram.com/rakrad07/?hl=es-la"><img src="../Images/icons/icono_instagram.png" alt="instagram"></a>
      </fieldset>

      <fieldset>
        <legend>Institucion</legend>

        <span>
          Universidad: Universidad Politecnica Salesian<br>
          Sede: Cuenca<br>
          Periodo: 56<br>
        </span>
      </fieldset>

      <fieldset>
        <legend>Contacto</legend>
        <span>
            Autores: <br>
            Pablo Esteban Loja Morocho<br>
            Robbyn Taurino Reyes Duchitanga<br>
            Correos: <br>
            <a href="mailto:rreyesd@est.ups.edu.ec">rreyesd@est.ups.edu.ec</a><br>
            <a href="mailto:rreyesd@est.ups.edu.ec">ploja@est.ups.edu.ec</a><br>
            Telefonos: <br>
                <a href="tel:+0969784090">0969784090</a><br>
                <a href="tel:+0969784090">0969784090</a><br>
        </span>
      </fieldset>
      
      <br>

      <span>&copy; Todos los derechos reservados.</span>
    </footer>
</body>
</html>