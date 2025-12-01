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

       

        <li class="nav-item active">
          <a class="nav-link" href="Table_Materia.php">
            <i class="fas fa-book"></i>
            <span>Prestamos</span>
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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Usuario</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
              </a>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

       <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tabla de Prestamos</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Prestamos
              </h6>
              <button
                class="btn btn-primary mb-3"
                data-toggle="modal"
                data-target="#modalCrearMateria">
                <i class="fas fa-user-plus"></i> Crear Prestamo
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table
                  class="table table-bordered"
                  id="tablaMateria"
                  width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Créditos</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Créditos</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Cancel
          </button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL CREAR MATERIA -->
  <div class="modal fade" id="modalCrearMateria" tabindex="-1" role="dialog" aria-labelledby="modalLabelCrear">
    <div class="modal-dialog" role="document">
      <form id="formCrearMateria">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabelCrear">Crear Prestamo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" name="Nombre" required />
            </div>
            <div class="form-group">
              <label>Descripción</label>
              <input type="text" class="form-control" name="Descripcion" />
            </div>
            <div class="form-group">
              <label>Créditos</label>
              <input type="number" class="form-control" name="Creditos" min="0" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancelar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL EDITAR MATERIA -->
  <div class="modal fade" id="modalEditarMateria" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form id="formEditarMateria">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Prestamo</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="idMateria" id="edit_idMateria" />

            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" name="Nombre" id="edit_Nombre" required />
            </div>
            <div class="form-group">
              <label>Descripción</label>
              <input type="text" class="form-control" name="Descripcion" id="edit_Descripcion" />
            </div>
            <div class="form-group">
              <label>Créditos</label>
              <input type="number" class="form-control" name="Creditos" id="edit_Creditos" min="0" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancelar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function () {
      var tabla = $("#tablaMateria").DataTable({
        ajax: "php/obtener_materia.php",
        columns: [
          { data: "idMateria" },
          { data: "Nombre" },
          { data: "Descripcion" },
          { data: "Creditos" },
          {
            data: null,
            render: function (data, type, row) {
              return `
                        <button class="btn btn-warning btn-sm btn-editar" data-id="${row.idMateria}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm btn-eliminar" data-id="${row.idMateria}">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
            },
          },
        ],
      });

      // Crear Materia
      $("#formCrearMateria").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
          url: "php/insertar_materia.php",
          type: "POST",
          data: $(this).serialize(),
          success: function (res) {
            console.log(res);
            if (res.status === "ok") {
              $("#modalCrearMateria").modal("hide");
              $("#formCrearMateria")[0].reset();
              tabla.ajax.reload();
              Swal.fire("¡Materia creada!", res.msg, "success");
            } else if (res.status === "existe") {
              Swal.fire("Duplicado", res.msg, "warning");
            } else {
              Swal.fire("Error", res.msg, "error");
            }
          },
          error: function (xhr) {
            console.error(xhr.responseText);
            Swal.fire(
              "Error crítico",
              "No se pudo conectar con el servidor.",
              "error"
            );
          },
        });
      });

      // Cargar datos en modal de edición
      $("#tablaMateria tbody").on("click", ".btn-editar", function () {
        var data = tabla.row($(this).parents("tr")).data();

        $("#edit_idMateria").val(data.idMateria);
        $("#edit_Nombre").val(data.Nombre);
        $("#edit_Descripcion").val(data.Descripcion);
        $("#edit_Creditos").val(data.Creditos);

        $("#modalEditarMateria").modal("show");
      });

      // Guardar cambios
      $("#formEditarMateria").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
          url: "php/editar_materia.php",
          type: "POST",
          data: $(this).serialize(),
          success: function (res) {
            if (res === "ok" || (res.status && res.status === "ok")) {
              $("#modalEditarMateria").modal("hide");
              $("#formEditarMateria")[0].reset();
              tabla.ajax.reload();
              Swal.fire(
                "¡Actualizado!",
                "La materia ha sido modificada.",
                "success"
              );
            } else {
              var msg =
                typeof res === "string"
                  ? res
                  : res.msg || "No se pudo actualizar la materia.";
              Swal.fire("Error", msg, "error");
            }
          },
        });
      });

      // Eliminar materia
      $("#tablaMateria tbody").on("click", ".btn-eliminar", function () {
        var data = tabla.row($(this).parents("tr")).data();
        var id = data.idMateria;

        Swal.fire({
          title: "¿Estás seguro?",
          text: "¡Esta acción no se puede deshacer!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#6c757d",
          confirmButtonText: "Sí, eliminar",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "php/eliminar_materia.php",
              type: "POST",
              data: { idMateria: id },
              success: function (res) {
                if (res === "ok") {
                  tabla.ajax.reload();
                  Swal.fire(
                    "¡Eliminado!",
                    "La materia ha sido eliminada.",
                    "success"
                  );
                } else {
                  Swal.fire(
                    "Error",
                    "No se pudo eliminar la materia.",
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