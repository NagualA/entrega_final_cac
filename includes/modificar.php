<?php 
include 'conexion.php'; 

if($_GET){
    if(isset($_GET['modificar'])){
        $id_orador = $_GET['modificar'];
        $_SESSION['id_orador'] = $id_orador;
    }
}

if($_POST){
    $conexion = new conexion();
    $id_orador = $_SESSION['id_orador'];
    $imagen = $conexion->consultar("select imagen FROM  `oradores` where id_orador=".$id_orador);
    unlink("../assets/upload/".$imagen[0]['imagen']);
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $tema = $_POST['tema'];
    $imagen_form = $_FILES['archivo']['name'];
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    $fecha = new DateTime();
    $imagen_form= $fecha->getTimestamp()."_".$imagen_form;
    move_uploaded_file($imagen_temporal,"../assets/upload/".$imagen_form);
    $sql = "UPDATE `oradores` SET `nombre` = '$nombre' , `imagen` = '$imagen_form', `apellido` = '$apellido' , `tema` = '$tema', `mail` = '$email'    WHERE `oradores`.`id_orador` = '$id_orador';";
    $id_orador = $conexion->ejecutar($sql);
    header("location:../pages/listado_admin.php");
    die(); 
}

include 'header.php'; 
$conexion = new conexion();
$oradores = $conexion->consultar("SELECT * FROM `oradores` where id_orador=".$id_orador);
// Resto del HTML y código PHP sigue aquí...
?>

<?php include 'main_modificar.php'; ?>
<?php include 'footer.php'; ?>

