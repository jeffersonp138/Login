<?php 
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    die("<p>Faça o <a href=\"index.php\">Login</a></p>");
}


?>