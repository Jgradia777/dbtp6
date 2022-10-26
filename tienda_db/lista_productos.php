<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">TIENDA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="lista_productos.php">Lista de articulos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Tipo de prenda
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Buzo</a></li>
                  <li><a class="dropdown-item" href="#">Remera</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Proximamente</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Marca
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Adidas</a></li>
                  <li><a class="dropdown-item" href="#">Nike</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Proximamente</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Talle
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Talle S</a></li>
                  <li><a class="dropdown-item" href="#">Talle M</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Talle L</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Precio
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Hasta $500</a></li>
                  <li><a class="dropdown-item" href="#">De $500 a $1.000</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">mas de $ 1.000</a></li>
                </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="agregar.html">Agregar</a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <h1>Tienda de ropa</h1>

<h2>Lista de ropa</h2>
<p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
<table border="1">
<tr>
    <th>ID</th>
    <th>TIPO DE PRENDA</th>
    <th>MARCA</th>
    <th>TALLE</th>
    <th>PRECIO</th>
    <th>IMAGEN</th>
    <th>EDITAR</th>
    <th>BORRAR</th>
</tr>
<?php
// 1) Conexion
$conexion=mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "productos");

// 2) Preparar la orden SQL
// Sintaxis SQL SELECT
// SELECT * FROM nombre_tabla
// => Selecciona todos los campos de la siguiente tabla
// SELECT campos_tabla FROM nombre_tabla
// => Selecciona los siguientes campos de la siguiente tabla
$consulta= "SELECT*FROM  productos";


// 3) Ejecutar la orden y obtenemos los registros
$datos = mysqli_query ($conexion, $consulta);

// 4) Mostrar los datos del registro
while ($fila = mysqli_fetch_array($datos) ) { ?>
    <tr>
    <td><?php echo $fila['id']; ?></td>
    <td><?php echo $fila['tipo_prenda']; ?></td>
    <td><?php echo $fila['marca']; ?></td>
    <td><?php echo $fila['talle']; ?></td>
    <td><?php echo $fila['precio']; ?></td>
    <td><img src="data:image/png;base64, <?php echo base64_encode($fila['imagen'])?>" alt="" width="100px" height="100px"></td>
    <td><a href="modificar.php?id=<?php echo $fila['id'];?>">Editar</a></td>
    <td><a href="borrar.php?id=<?php echo $fila['id'];?>">Borrar</a></td>
    </tr>
  <?php } ?>
</table>

      <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>