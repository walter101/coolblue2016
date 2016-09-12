<?php




if(HOST_TYPE=="server"){
defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER') ? null : define("DB_USER", "waltepf108_DOnot");
defined('DB_PASS') ? null : define("DB_PASS", "test5MrS771");
defined('DB_NAME') ? null : define("DB_NAME", "waltepf108_photogallerie");
} else {
defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER') ? null : define("DB_USER", "root");
defined('DB_PASS') ? null : define("DB_PASS", "");
defined('DB_NAME') ? null : define("DB_NAME", "photogallerie");}





//$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)   or die('No connection to database: '.mysqli_connect_error());  
?>