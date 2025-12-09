<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Biblioteca Virtual</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a2d9d5d8a8.js" crossorigin="anonymous"></script>

  <style>
    body {
      background: linear-gradient(135deg, #224abe, #4e73df);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Segoe UI", sans-serif;
    }

    .login-container {
      background: white;
      width: 380px;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.25);
      text-align: center;
    }

    .login-container h3 {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .login-container p {
      color: #6c757d;
      font-size: 14px;
    }

    .form-control {
      border-radius: 10px;
      padding: 12px;
    }

    .btn-login {
      background: #224abe;
      border: none;
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      font-size: 16px;
      color: white;
      transition: 0.2s;
    }

    .btn-login:hover { background: #1e3f9e; }

    .icon-login {
      font-size: 60px;
      color: #224abe;
      margin-bottom: 15px;
    }

    .footer-text {
      margin-top: 20px;
      font-size: 13px;
      color: white;
      text-align: center;
    }

    a { color: #dbe1ff; }
    a:hover { color: #ffffff; }
  </style>
</head>
<body>

  <div class="login-container">
    <i class="fas fa-book-reader icon-login"></i>
    <h3>Biblioteca Virtual</h3>
    <p>Inicia sesión para continuar</p>

    <form action="validar_login.php" method="POST">
      <div class="mb-3 text-start">
        <label class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" placeholder="Ingresa tu usuario" required />
      </div>

      <div class="mb-3 text-start">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required />
      </div>

      <button type="submit" class="btn-login">Ingresar</button>
    </form>
  </div>

  <p class="footer-text">© 2025 Biblioteca Virtual | Desarrollado por Alex C García González</p>

</body>
</html>
