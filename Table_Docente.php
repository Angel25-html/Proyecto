<?php
include("php/verificar_rol.php");
verificarRol(['Docente', 'Administrador']);

// Obtener el rol del usuario actual
$rol_usuario = $_SESSION['rol'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <hr class="sidebar-divider" />

      <?php if ($rol_usuario === 'Docente' || $rol_usuario === 'Administrador'): ?>
        <!-- Visible para Docente y Administrador -->
        <li class="nav-item">
          <a class="nav-link" href="table_alumnos.php">
            <i class="fas fa-user-graduate"></i>
            <span>Alumnos</span>
          </a>
        </li>
        <hr class="sidebar-divider" />

       >

        <li class="nav-item">
          <a class="nav-link" href="Table_Materia.php">
            <i class="fas fa-book"></i>
            <span>Materias</span>
          </a>
        </li>
        <hr class="sidebar-divider" />
      <?php endif; ?>

      <?php if ($rol_usuario === 'Administrador'): ?>
        <!-- Solo visible para Administrador -->
        <li class="nav-item">
          <a class="nav-link" href="Table_Usuarios.php">
            <i class="fas fa-users"></i>
            <span>Usuarios</span>
          </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block" />
      <?php endif; ?>

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End Sidebar -->



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav
          class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <form class="form-inline">
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>
        </nav>
        <!-- End Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tabla de Docentes</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Docentes
              </h6>
              <button
                class="btn btn-primary mb-3"
                data-toggle="modal"
                data-target="#modalCrearDocente">
                <i class="fas fa-user-plus"></i> Crear Docente
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table
                  class="table table-bordered"
                  id="tablaDocente"
                  width="100%"
                  cellspacing="0">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Género</th>
                    <th>Teléfono</th>
                    <th>No. Control</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                      <th>Género</th>
                      <th>Teléfono</th>
                      <th>No. Control</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- End Container -->
      </div>
      <!-- End Main Content -->

      <footer class="sticky-footer bg-white">
        <div class="container my-auto text-center">
          <span>Copyright &copy; Your Website 2020</span>
        </div>
      </footer>
    </div>
    <!-- End Content Wrapper -->
  </div>
  <!-- End Page Wrapper -->

  <!-- MODAL CREAR DOCENTE -->
  <div class="modal fade" id="modalCrearDocente" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form id="formCrearDocente">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Crear Docente</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nombre</label>
              <input
                type="text"
                class="form-control"
                name="Nombre"
                required />
            </div>
            <div class="form-group">
              <label>Apellido Paterno</label>
              <input
                type="text"
                class="form-control"
                name="ApellidoPaterno"
                required />
            </div>
            <div class="form-group">
              <label>Apellido Materno</label>
              <input
                type="text"
                class="form-control"
                name="ApellidoMaterno"
                required />
            </div>
            <div class="form-group">
              <label>Género</label>
              <select class="form-control" name="Genero" required>
                <option value="">Seleccione...</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              </select>
            </div>
            <div class="form-group">
              <label>Teléfono</label>
              <input
                type="text"
                class="form-control"
                name="Telefono"
                required />
            </div>
            <div class="form-group">
              <label>No. Control</label>
              <input
                type="text"
                class="form-control"
                name="Ncontrol"
                required />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal">
              Cancelar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL EDITAR DOCENTE -->
  <div class="modal fade" id="modalEditarDocente" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form id="formEditarDocente">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Docente</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="idMaestro" id="edit_idMaestro" />
            <div class="form-group">
              <label>Nombre</label>
              <input
                type="text"
                class="form-control"
                name="Nombre"
                id="edit_Nombre"
                required />
            </div>
            <div class="form-group">
              <label>Apellido Paterno</label>
              <input
                type="text"
                class="form-control"
                name="ApellidoPaterno"
                id="edit_ApellidoPaterno"
                required />
            </div>
            <div class="form-group">
              <label>Apellido Materno</label>
              <input
                type="text"
                class="form-control"
                name="ApellidoMaterno"
                id="edit_ApellidoMaterno"
                required />
            </div>
            <div class="form-group">
              <label>Género</label>
              <select
                class="form-control"
                name="Genero"
                id="edit_Genero"
                required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              </select>
            </div>
            <div class="form-group">
              <label>Teléfono</label>
              <input
                type="text"
                class="form-control"
                name="Telefono"
                id="edit_Telefono"
                required />
            </div>
            <div class="form-group">
              <label>No. Control</label>
              <input
                type="text"
                class="form-control"
                name="Ncontrol"
                id="edit_Ncontrol"
                required />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal">
              Cancelar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(document).ready(function() {
      var tabla = $("#tablaDocente").DataTable({
        ajax: "php/obtener_docente.php",
        columns: [{
            data: "idMaestro"
          },
          {
            data: "Nombre"
          },
          {
            data: "ApellidoPaterno"
          },
          {
            data: "ApellidoMaterno"
          },
          {
            data: "Genero"
          },
          {
            data: "Telefono"
          },
          {
            data: "Ncontrol"
          },
          {
            data: null,
            render: function(data, type, row) {
              return `
                                <button class="btn btn-warning btn-sm btn-editar" data-id="${row.idMaestro}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm btn-eliminar" data-id="${row.idMaestro}"><i class="fas fa-trash"></i></button>
                            `;
            },
          },
        ],
      });

      // Crear Docente
      $("#formCrearDocente").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
          url: "php/insertar_docente.php",
          type: "POST",
          data: $(this).serialize(),
          success: function(res) {
            if (res.status === "ok") {
              $("#modalCrearDocente").modal("hide");
              $("#formCrearDocente")[0].reset();
              tabla.ajax.reload();
              Swal.fire("¡Docente creado!", res.msg, "success");
            } else if (res.status === "existe") {
              Swal.fire("Duplicado", res.msg, "warning");
            } else {
              Swal.fire("Error", res.msg, "error");
            }
          },
        });
      });

      // Cargar datos en modal de edición
      $("#tablaDocente tbody").on("click", ".btn-editar", function() {
        var data = tabla.row($(this).parents("tr")).data();
        $("#edit_idMaestro").val(data.idMaestro);
        $("#edit_Nombre").val(data.Nombre);
        $("#edit_ApellidoPaterno").val(data.ApellidoPaterno);
        $("#edit_ApellidoMaterno").val(data.ApellidoMaterno);
        $("#edit_Genero").val(data.Genero);
        $("#edit_Telefono").val(data.Telefono);
        $("#edit_Ncontrol").val(data.Ncontrol);
        $("#modalEditarDocente").modal("show");
      });

      // Editar Docente
      $("#formEditarDocente").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
          url: "php/editar_docente.php",
          type: "POST",
          data: $(this).serialize(),
          success: function(res) {
            if (res === "ok") {
              $("#modalEditarDocente").modal("hide");
              $("#formEditarDocente")[0].reset();
              tabla.ajax.reload();
              Swal.fire(
                "¡Actualizado!",
                "El docente ha sido modificado.",
                "success"
              );
            } else {
              Swal.fire(
                "Error",
                "No se pudo actualizar el docente.",
                "error"
              );
            }
          },
        });
      });

      // Eliminar Docente
      $("#tablaDocente tbody").on("click", ".btn-eliminar", function() {
        var data = tabla.row($(this).parents("tr")).data();
        var id = data.idMaestro;
        Swal.fire({
          title: "¿Estás seguro?",
          text: "¡No podrás revertir esto!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sí, eliminar!",
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "php/eliminar_docente.php",
              type: "POST",
              data: {
                idMaestro: id
              },
              success: function(res) {
                if (res === "ok") {
                  tabla.ajax.reload();
                  Swal.fire(
                    "¡Eliminado!",
                    "El docente ha sido eliminado.",
                    "success"
                  );
                } else {
                  Swal.fire(
                    "Error",
                    "No se pudo eliminar el docente.",
                    "error"
                  );
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