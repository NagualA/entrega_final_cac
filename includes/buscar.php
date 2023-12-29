<?php if ($_POST){
            if(isset($_POST['temabuscar'])){
                $tema_a_buscar = $_POST['temabuscar'];
                include '../includes/conexion.php';
                $conexion = new conexion();
                $query =  "SELECT * FROM `oradores` WHERE `tema` LIKE ".'"%'.$tema_a_buscar.'%"';
               # echo $query;
                $oradores= $conexion->consultar($query);
                include_once("../includes/header.php");
                include_once("../includes/main_listadotema.php");
                include_once("../includes/footer.php");
            }
        } 
       
?> 