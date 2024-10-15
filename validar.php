<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","u378591789_g2e66","OIWr2K^H0g","u378591789_x0pUH");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:admin_panel.php");

}else
if($filas['id_cargo']==2){ //cliente
header("location:cliente.php");
}
else{
    ?>
    <?php
    include("admin_panel.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
