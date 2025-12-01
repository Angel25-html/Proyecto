
<?php
include("php/verificar_rol.php");
verificarRol(['Administrador']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Configuración básica del documento HTML -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>SB Admin 2 - Tabla de Libros</title>

  <!-- Fuentes e íconos -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet" />

  <!-- Estilos principales del panel -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="css/custom.css" rel="stylesheet" />

  <!-- Estilos específicos para DataTables -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Contenedor principal -->
  <div id="wrapper">
    <!-- Barra lateral (Menú) -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Logo del panel -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Separadores -->
      <hr class="sidebar-divider" />
      <hr class="sidebar-divider my-0" />

      <!-- Opciones del menú -->
      <li class="nav-item"><a class="nav-link" href="table_alumnos.php"><i class="fas fa-user-graduate"></i><span>Usuarios</span></a></li>
      <hr class="sidebar-divider" />



      <li class="nav-item"><a class="nav-link" href="Table_Materia.php"><i class="fas fa-book"></i><span>Prestamos</span></a></li>
      <hr class="sidebar-divider" />

      <li class="nav-item active"><a class="nav-link" href="Table_Usuarios.php"><i class="fas fa-users"></i><span>Libros</span></a></li>
      <hr class="sidebar-divider d-none d-md-block" />

      <!-- Botón para ocultar la barra lateral -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- Fin de la barra lateral -->

    <!-- Contenedor del contenido -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- Barra superior -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <form class="form-inline">
            <!-- Botón de menú para pantallas pequeñas -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Información de usuario -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Libro</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
              </a>
            </li>
          </ul>
        </nav>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tabla de Libros</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Libros
              </h6>
              <button
                class="btn btn-primary mb-3"
                data-toggle="modal"
                data-target="#modalCrearUsuario">
                <i class="fas fa-user-plus"></i> Crear Libro
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table
                  class="table table-bordered"
                  id="tablaUsuarios"
                  width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre de Libro</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Rol</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre de Libro</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Rol</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie de página -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto text-center">
          <span>Copyright &copy; Your Website 2020</span>
        </div>
      </footer>
    </div>
  </div>

  <!-- Botón para subir al inicio -->
  <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

  <!-- MODAL PARA CREAR USUARIO -->
  <div class="modal fade" id="modalCrearUsuario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form id="formCrearUsuario">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Crear Libro</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            <!-- Campos del formulario -->
            <div class="form-group"><label>Nombre de Libro</label><input type="text" class="form-control" name="nombre_usuario" required /></div>
            <div class="form-group"><label>Nombre Completo</label><input type="text" class="form-control" name="nombre" required /></div>
            <div class="form-group"><label>Contraseña</label><input type="password" class="form-control" name="password" required /></div>
            <div class="form-group"><label>Rol</label>
              <select class="form-control" name="rol" required>
                <option value="Docente">Docente</option>
                <option value="Alumno">Alumno</option>
                <option value="Administrador">Administrador</option>
              </select>
            </div>
            <div class="form-group"><label>Correo Electrónico</label><input type="email" class="form-control" name="e_mail" required /></div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL PARA EDITAR USUARIO -->
  <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form id="formEditarUsuario">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Libro</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
          <div class="modal-body">
            <!-- Campos del formulario de edición -->
            <input type="hidden" name="id_usuario" id="edit_id_usuario">
            <div class="form-group"><label>Nombre de Libro</label><input type="text" class="form-control" name="nombre_usuario" id="edit_nombre_usuario" required></div>
            <div class="form-group"><label>Nombre Completo</label><input type="text" class="form-control" name="nombre" id="edit_nombre" required></div>
            <div class="form-group"><label>Contraseña</label><input type="password" class="form-control" name="password" id="edit_password"></div>
            <div class="form-group"><label>Correo Electrónico</label><input type="email" class="form-control" name="e_mail" id="edit_e_mail" required></div>
            <div class="form-group"><label>Rol</label>
              <select class="form-control" name="rol" id="edit_rol" required>
                <option value="Docente">Docente</option>
                <option value="Alumno">Alumno</option>
                <option value="Administrador">Administrador</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Scripts principales -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Script personalizado con funciones CRUD -->
  <script>
    $(document).ready(function() {
      // Inicializa la tabla usando DataTables con datos obtenidos mediante AJAX
      var tabla = $("#tablaUsuarios").DataTable({
        ajax: "php/obtener_usuario.php", // Archivo PHP que devuelve los datos en formato JSON
        columns: [{
            data: "ID"
          },
          {
            data: "Usuario"
          },
          {
            data: "Nombre"
          },
          {
            data: "Correo"
          },
          {
            data: "Rol"
          },
          {
            // Renderiza botones de acción (editar y eliminar)
            data: null,
            render: function(data) {
              return `
                <button class="btn btn-warning btn-sm btn-editar" data-id="${data.ID}">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm btn-eliminar" data-id="${data.ID}">
                  <i class="fas fa-trash"></i>
                </button>`;
            },
          },
        ],
      });

      // Crear usuario (envía datos a insertar_usuario.php)
      $("#formCrearUsuario").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
          url: "php/insertar_usuario.php",
          type: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function(res) {
            if (res.status === "ok") {
              $("#modalCrearUsuario").modal("hide");
              $("#formCrearUsuario")[0].reset();
              tabla.ajax.reload();
              Swal.fire("¡Usuario creado!", res.msg, "success");
            } else if (res.status === "existe") {
              Swal.fire("Duplicado", res.msg, "warning");
            } else {
              Swal.fire("Error", res.msg, "error");
            }
          },
          error: function() {
            Swal.fire("Error", "No se pudo conectar con el servidor", "error");
          },
        });
      });

      // Cargar datos en el modal de edición
      $("#tablaUsuarios tbody").on("click", ".btn-editar", function() {
        var data = tabla.row($(this).parents("tr")).data();
        $("#edit_id_usuario").val(data.ID);
        $("#edit_nombre_usuario").val(data.Usuario);
        $("#edit_nombre").val(data.Nombre);
        $("#edit_e_mail").val(data.Correo);
        $("#edit_rol").val(data.Rol);
        $("#modalEditarUsuario").modal("show");
      });

      // Editar usuario (envía datos a editar_usuario.php)
      $("#formEditarUsuario").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
          url: "php/editar_usuario.php",
          type: "POST",
          data: $(this).serialize(),
          success: function(res) {
            if (res === "ok") {
              $("#modalEditarUsuario").modal("hide");
              tabla.ajax.reload();
              Swal.fire("¡Actualizado!", "El Libro ha sido modificado.", "success");
            } else {
              Swal.fire("Error", "No se pudo actualizar el Libro.", "error");
            }
          },
        });
      });

      // Eliminar usuario (envía ID a eliminar_usuario.php)
      $("#tablaUsuarios tbody").on("click", ".btn-eliminar", function() {
        var id = $(this).data("id");
        Swal.fire({
          title: "¿Estás seguro?",
          text: "Esta acción no se puede deshacer.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#6c757d",
          confirmButtonText: "Sí, eliminar",
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "php/eliminar_usuario.php",
              type: "POST",
              data: {
                id_usuario: id
              },
              success: function(res) {
                if (res === "ok") {
                  tabla.ajax.reload();
                  Swal.fire("¡Eliminado!", "El Libro ha sido eliminado.", "success");
                } else {
                  Swal.fire("Error", "No se pudo eliminar el Libro.", "error");
                }
              },
            });
          }
        });
      });
    });
  </script>
</body>

</html>