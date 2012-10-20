<div class="container_12" id="menu">
<div class="grid_12" >
<a href="noticias.php">Todas las noticias</a> | 

<?php if($sesion->get("rol") == "PERIODISTA" || $sesion->get("rol") == "EDITOR") echo '<a href="noticias_nueva.php">Nueva Noticia</a> | '; ?>

<?php if($sesion->get("rol") == "EDITOR") echo '<a href="periodistas.php">Administrar Periodistas</a> | '; ?>

<?php if($sesion->get("usuario") == false) echo '<a href="login.php">Iniciar Sesi&oacute;n</a>'; else echo '<a href="logout.php">Cerrar Sesi&oacute;n</a>';?>

</div>
</div>