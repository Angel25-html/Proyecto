<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca Virtual</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #4e73df, #224abe);
      color: white;
      min-height: 100vh;
    }
    .card {
      border: none;
      border-radius: 15px;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0px 6px 20px rgba(0,0,0,0.2);
    }
    .card i {
      font-size: 60px;
      margin-bottom: 10px;
      color: #224abe;
    }
    .container {
      margin-top: 100px;
    }
  </style>
  <script src="https://kit.fontawesome.com/a2d9d5d8a8.js" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        📚 Biblioteca Virtual
      </a>
    </div>
  </nav>

  <div class="container text-center">
    <h1 class="mb-4 mt-4">Bienvenido al Sistema de Biblioteca</h1>
    <p class="mb-5">Gestiona los libros, usuarios y préstamos de manera sencilla.</p>

    <div class="row justify-content-center">
      <!-- LIBROS -->
      <div class="col-md-4 mb-4">
        <a href="libros/mostrar_libros.php" class="text-decoration-none text-dark">
          <div class="card p-4 shadow-lg">
            <i class="fas fa-book"></i>
            <h4>Gestión de Libros</h4>
            <p>Registrar, editar y eliminar libros disponibles.</p>
          </div>
        </a>
      </div>

      <!-- USUARIOS -->
      <div class="col-md-4 mb-4">
        <a href="usuarios/mostrar_usuarios.php" class="text-decoration-none text-dark">
          <div class="card p-4 shadow-lg">
            <i class="fas fa-user"></i>
            <h4>Gestión de Usuarios</h4>
            <p>Administrar los datos de los usuarios registrados.</p>
          </div>
        </a>
      </div>

      <!-- PRÉSTAMOS -->
      <div class="col-md-4 mb-4">
        <a href="prestamos/mostrar_prestamos.php" class="text-decoration-none text-dark">
          <div class="card p-4 shadow-lg">
            <i class="fas fa-hand-holding"></i>
            <h4>Gestión de Préstamos</h4>
            <p>Controlar préstamos activos y devoluciones.</p>
          </div>
        </a>
      </div>
    </div>
  </div>

  <footer class="text-center mt-5 text-light">
    <p>© 2025 Biblioteca Virtual | Desarrollado por <b>Alex C García González</b></p>
  </footer>
</body>
</html>
