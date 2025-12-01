<?php
$msg = $_GET['msg'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio de Sesión</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <div class="text-center mb-3">
      <h4 class="text-primary"><i class="fa-solid fa-user-shield"></i> Iniciar Sesión</h4>
    </div>

    <form method="POST" action="php/login.php">
      <div class="mb-3">
        <label class="form-label">Usuario</label>
        <input type="text" name="nombre_usuario" class="form-control" placeholder="Ingrese su usuario" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">
        <i class="fa-solid fa-right-to-bracket"></i> Entrar
      </button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <?php if ($msg): ?>
  <script>
    const alerts = {
      nouser: { icon: 'error', title: 'Usuario no encontrado', text: 'Verifica tu nombre de usuario.' },
      wrongpass: { icon: 'error', title: 'Contraseña incorrecta', text: 'Por favor, verifica tus datos.' },
      empty: { icon: 'warning', title: 'Campos vacíos', text: 'Por favor llena todos los campos.' },
      logout: { icon: 'success', title: 'Sesión cerrada correctamente' },
      default: { icon: 'info', title: 'Ocurrió un error desconocido' }
    };

    const msg = '<?= $msg ?>';
    Swal.fire({ ...(alerts[msg] || alerts.default), confirmButtonColor: '#4e73df' });
  </script>
  <?php endif; ?>

</body>
</html>
