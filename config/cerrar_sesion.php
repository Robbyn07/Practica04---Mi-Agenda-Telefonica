<?php
 session_start();
 $_SESSION['isLogged'] = FALSE;
 session_destroy();
 header("Location: /Practica04---Mi-Agenda-Telefonica/public/vista/login.html");
?>