<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Biblioteca Virtual</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a2d9d5d8a8.js" crossorigin="anonymous"></script>

  <style>
    body {
      background: #f4f6f9;
      font-family: "Segoe UI", sans-serif;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background: #343a40;
      color: white;
      padding-top: 20px;
      transition: 0.3s;
    }

    .sidebar h4 {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      padding: 12px 25px;
      color: #ddd;
      text-decoration: none;
      transition: 0.2s;
    }

    .sidebar a:hover {
      background: #495057;
      color: #fff;
    }

    /* Content */
    .content {
      margin-left: 260px;
      padding: 30px;
    }

    /* Cards */
    .card-dashboard {
      border: none;
      border-radius: 12px;
      padding: 25px;
      color: white;
    }

    .bg-libros { background: #4e73df; }
    .bg-usuarios { background: #1cc88a; }
    .bg-prestamos { background: #f6c23e; }

    .icon-card {
      font-size: 50px;
      opacity: 0.8;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4><i class="fas fa-book-reader"></i> Biblioteca</h4>
    <a href="#"><i class="fas fa-home me-2"></i> Dashboard</a>
    <a href="libros/mostrar_libros.php"><i class="fas fa-book me-2"></i> Libros</a>
    <a href="usuarios/mostrar_usuarios.php"><i class="fas fa-user me-2"></i> Usuarios</a>
    <a href="prestamos/mostrar_prestamos.php"><i class="fas fa-hand-holding me-2"></i> Préstamos</a>
    <hr class="text-light" />
    <a href="#"><i class="fas fa-cog me-2"></i> Configuración</a>
    <a href="#"><i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión</a>
  </div>

  <!-- Content -->
  <div class="content">
    <h2 class="mb-4">Panel Administrativo</h2>
    <p class="mb-4">Bienvenido al panel de control. Administra toda la biblioteca desde un solo lugar.</p>

    <div class="row">
      <!-- Libros -->
      <div class="col-md-4 mb-4">
        <div class="card-dashboard bg-libros shadow">
          <div class="d-flex justify-content-between">
            <div>
              <h4>Libros</h4>
              <p>Gestión general de libros</p>
            </div>
            <i class="fas fa-book icon-card"></i>
          </div>
          <a href="libros/mostrar_libros.php" class="btn btn-light btn-sm mt-3">Ir a Libros</a>
        </div>
      </div>

      <!-- Usuarios -->
      <div class="col-md-4 mb-4">
        <div class="card-dashboard bg-usuarios shadow">
          <div class="d-flex justify-content-between">
            <div>
              <h4>Usuarios</h4>
              <p>Control de usuarios registrados</p>
            </div>
            <i class="fas fa-user icon-card"></i>
          </div>
          <a href="usuarios/mostrar_usuarios.php" class="btn btn-light btn-sm mt-3">Ir a Usuarios</a>
        </div>
      </div>

      <!-- Préstamos -->
      <div class="col-md-4 mb-4">
        <div class="card-dashboard bg-prestamos shadow">
          <div class="d-flex justify-content-between">
            <div>
              <h4>Préstamos</h4>
              <p>Control y seguimiento</p>
            </div>
            <i class="fas fa-hand-holding icon-card"></i>
          </div>
          <a href="prestamos/mostrar_prestamos.php" class="btn btn-light btn-sm mt-3">Ir a Préstamos</a>
        </div>
      </div>
    </div>

    <!-- Sección de estadísticas -->
    <h3 class="mt-5 mb-3">Estadísticas Generales</h3>
    <div class="row">
      <div class="col-md-3 mb-3">
        <div class="card p-3 text-center shadow">
          <h5>Total Libros</h5>
          <h2>250</h2>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card p-3 text-center shadow">
          <h5>Usuarios Registrados</h5>
          <h2>120</h2>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card p-3 text-center shadow">
          <h5>Préstamos Activos</h5>
          <h2>35</h2>
        </div>
      </div>

      <div class="col-md-3 mb-3">
        <div class="card p-3 text-center shadow">
          <h5>Devoluciones Pendientes</h5>
          <h2>5</h2>
        </div>
      </div>
    </div>

  </div>
</body>
</html>
