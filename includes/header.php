<?php if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    #defino una constante con la url base , cuando suban a 000webhost es otra la url, para armar rutas relativas
    define('BASE_URL', 'http://localhost/trabajo_integrador_cac/');
  define('BASE_URL', 'https://crudgisephp.000webhostapp.com/');
   #si no hay iniciada ninguna session, entonces la iniciamos
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/estilos-propios.css">
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/codoacodo-min.png" type="image/x-icon">

  <title>Trabajo Integrador</title>
</head>
<body class="body">

<header>
        <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                <img src="<?php echo BASE_URL; ?>assets/img/codoacodo-min.png" alt="Codo a Codo logo">
                    Conf Bs As
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="header__contenedorEnlaces__listaHorizontal">
                    <li><a href="<?php echo BASE_URL; ?>index.php">La conferencia</a></li>
                    <li><a href="<?php echo BASE_URL; ?>index.php#oradores">Los oradores</a></li>
                    <li><a href="<?php echo BASE_URL; ?>index.php#lugarYFecha">El lugar y la fecha</a></li>
                    <li><a href="<?php echo BASE_URL; ?>index.php#formulario">Convertite en orador</a></li>
                    <li><a href="<?php echo BASE_URL; ?>index.php./pages/tickets.html">Comprar tickets</a></li>
                        <?php 
                        #si existe un inicio de sesion, me muestra quien esta logueado
                        if (isset($_SESSION['usuario'])) {
                            // Usuario logueado: mostrar opción para cerrar sesión
                        ?>  <!-- 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php #echo $_SESSION['usuario']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                                </ul>
                             </li>-->
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo BASE_URL; ?>includes/cerrar.php">Cerrar Sesión de: <span><?php echo $_SESSION['usuario']; ?></span></a> 
                            </li>
                        <?php 
                        } else {
                            // Usuario no logueado: mostrar opción para iniciar sesión
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>includes/login.php">LogIn</a>
                            </li>
                        <?php 
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>