<?php
function menu() {
  $opcion = '<li><a href="view/login.php">Ingresar</a></li>';
  $menuEspecial = '';

  if (isset($_SESSION['user']) && $_SESSION['user']) {
    $opcion = '<li><a href="view/logout.php">Salir</a></li>';
    $menuEspecial = ' <li>
                      <a href="#">Operaciones</a>
                      <ul>
                        <li>
                          <a href="#">Usuarios</a>
                          <ul>
                            <li><a href="view/altaUsuario.php">Crear Usuario</a></li>
                            <li><a href="view/listadoUsuarios.php">Listado de Usuarios</a></li>                            
                          </ul>
                        </li>
                        <li>
                          <a href="#">Pedidos</a>
                          <ul>
                            <li><a href="view/pedido.php">Cargar Pedido</a></li>                            
                            <li><a href="view/listadoPedidos.php">Listado de Pedidos</a></li>
                          </ul>
                        </li>
                      </ul>';
  }

  $html = '<nav>
            <div id="header">          
              <ul class="bar">
                <li>
                  <a><i class="fas fa-bars"></i></a>          
                  <ul class="nav">
                    <li><a href="index.php">Inicio</i></a></li>
                    <li>
                      <a href="#">Servicios</a>
                      <ul>
                        <li><a href="#">Venta</a></li>
                        <li><a href="#">Colocación</a></li>
                        <li><a href="#">Reparación</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">Acerca de</a>
                      <ul>
                        <li><a href="#nosotros">Nosotros</a></li>
                        <li><a href="#historia">Historia</a></li>
                        <li><a href="#mision">Nuestra Misión</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Contacto</a></li>
                    '.$menuEspecial.$opcion.'
                  </ul>
                </li>
              </ul>
            </div>
          </nav>';

  return $html;
}

function menu_bs($active) {
  $html = '<nav class="navbar navbar-expand-md navbar-light bg-warning fixed-top" aria-label="navBar">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item dropdown multi-level-dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown04">
                                <li><a class="dropdown-item '.($active == 'a'? 'active':'').'" navbar href="altaUsuario.php">Crear Usuario</a></li>
                                <li><a class="dropdown-item '.($active == 'u'? 'active':'').'" href="listadoUsuarios.php">Lista de Usuarios</a></li>                                        
                            </ul>
                        </li>
                        <li class="nav-item dropdown multi-level-dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Pedidos</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                <li><a class="dropdown-item '.($active == 'c'? 'active':'').'" navbar href="pedido.php">Cargar Pedido</a></li>
                                <li><a class="dropdown-item '.($active == 'p'? 'active':'').'" href="listadoPedidos.php">Lista de Pedidos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="logout.php">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
          </nav>';
  
  return $html;
}
