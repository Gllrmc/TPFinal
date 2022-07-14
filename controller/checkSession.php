<?php
  if (!isset($_SESSION)) {
		session_start();
	}
    
    // Si esta definida la variable de session 'user' y tengo datos en dicha variable, redirecciono a inicio.php
    if (!isset($_SESSION['user'])) {
        header("Location: ../index.php");
    }
?>