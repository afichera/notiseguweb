<?php require("sesion.php");?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
<script type="text/javascript" src="js/validaciones.js"></script>
</head>

<body>
<!-- Encabezado-->
<?php include("encabezado.php");?>

<!-- Men�-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
  <div class="grid_12" >
    <h1>Alta Nuevo Periodista</h1>
  </div>
  <div class="grid_12" >

    <form name="formulario" action="periodistas_abm.php" method="post" onsubmit="return verificar_alta_cliente()">
      <table>
     
        <tr>
          <td> Nombre y apellido: </td>
          <td><input type="text" name="nombre" value="" /> <label class="alerta" id="nombre_msg">
</label></td>
        </tr>
        <tr>
          <td> Nombre de Usuario: </td>

          <td><input type="text" name="usuario" value="" />   <label class="alerta" id="usuario_msg"></td>
        </tr>
        <tr><td>Password:</td><td><input type="password" name="password" value="" />  <label class="alerta" id="password_msg"></td>
        </tr>
<tr><td>Repita Password:</td><td><input type="password" name="password2" value="" />  <label class="alerta" id="password2_msg"></td>
        </tr>
        
        
      </table>
      <input type="submit" name="abm" value="Agregar" class="boton"/>
      <input type="reset" value="Limpiar Formulario" class="boton"/>
      <a href="periodistas.php" class="boton">Cancelar</a>
    </form>
  </div>
</div>

<!-- Pie-->
<?php include("pie.php");?>
</body>
</html>