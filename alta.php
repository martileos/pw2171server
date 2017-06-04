<?php
include("utilerias.php");
print("<form action='guardaalta.php' method='post'>");
print("<input type='text' placeholder='usuario' name='txtUsuario'><br>");
print("<input type='text' placeholder='nombre' name='txtNombre'><br>");
print("<input type='text' placeholder='clave' name='txtClave'><br>");
print("<input type='text' placeholder='depto' name='txtDepto'><br>");
print("<input type='text' placeholder='vigencia' name='txtVigencia'><p>");
print("<input type='submit' value='Guardar'>");
print("</form>");
?>