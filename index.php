<?php
ini_set('display_errors', 1); 
ini_set('log_errors', 1); 

error_reporting(E_ALL);


/*
 * INCLUDES
 */
include("Config/config.php");       // configuracion general
include("Class/themeClass.php");    // objeto del template

/*
 * OBJETOS
 */
$theme = new themeClass();


# Cargamos el template
$theme->loader_template("header");

?>