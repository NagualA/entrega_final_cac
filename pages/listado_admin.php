<?php 
include '../includes/conexion.php'; 

if($_GET){
    $conexion = new conexion();

    if(isset($_GET['borrar'])){
        $id_orador = $_GET['borrar'];
        $imagen = $conexion->consultar("select imagen FROM  `oradores` where id_orador=".$id_orador);
        unlink("../assets/upload/".$imagen[0]['imagen']);
        $sql ="DELETE FROM `oradores` WHERE `oradores`.`id_orador` =".$id_orador; 
        $id_orador = $conexion->ejecutar($sql);
        header("Location:listado_admin.php");
        die();
    }

    if(isset($_GET['modificar'])){
        $id_orador = $_GET['modificar'];
        header("Location:../includes/modificar.php?modificar=".$id_orador);
        die();
    }
}

include_once("../includes/header.php");

$conexion = new conexion();
$oradores = $conexion->consultar("SELECT * FROM `oradores`");
// Resto del HTML y código PHP sigue aquí...
?>

<?php include_once("../includes/main_listadoadmin.php")?>
<?php include_once("../includes/footer.php")?>
