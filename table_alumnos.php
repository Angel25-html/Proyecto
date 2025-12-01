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
        <li class="nav-item active">
          <a class="nav-link" href="table_alumnos.php">
            <i class="fas fa-user-graduate"></i>
            <span>Usuarios</span>
          </a>
        </li>
        <hr class="sidebar-divider" />

        

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
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
              <button
                id="sidebarToggleTop"
                class="btn btn-link d-md-none rounded-circle mr-3"
              >
                <i class="fa fa-bars"></i>
              </button>
            </form>

            <!-- Topbar Search -->
            <form
              class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            >
              <div class="input-group">
                <input
                  type="text"
                  class="form-control bg-light border-0 small"
                  placeholder="Search for..."
                  aria-label="Search"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div
                  class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <!-- Nav Item - Alerts -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="alertsDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-bell fa-fw"></i>
                  <!-- Counter - Alerts -->
                  <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div
                  class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="alertsDropdown"
                >
                  <h6 class="dropdown-header">Alerts Center</h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 12, 2019</div>
                      <span class="font-weight-bold"
                        >A new monthly report is ready to download!</span
                      >
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 7, 2019</div>
                      $290.29 has been deposited into your account!
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 2, 2019</div>
                      Spending Alert: We've noticed unusually high spending for
                      your account.
                    </div>
                  </a>
                  <a
                    class="dropdown-item text-center small text-gray-500"
                    href="#"
                    >Show All Alerts</a
                  >
                </div>
              </li>

              <!-- Nav Item - Messages -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="messagesDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-envelope fa-fw"></i>
                  <!-- Counter - Messages -->
                  <span class="badge badge-danger badge-counter">7</span>
                </a>
                <!-- Dropdown - Messages -->
                <div
                  class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="messagesDropdown"
                >
                  <h6 class="dropdown-header">Message Center</h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                      <img
                        class="rounded-circle"
                        src="img/undraw_profile_1.svg"
                        alt="..."
                      />
                      <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                      <div class="text-truncate">
                        Hi there! I am wondering if you can help me with a
                        problem I've been having.
                      </div>
                      <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                      <img
                        class="rounded-circle"
                        src="img/undraw_profile_2.svg"
                        alt="..."
                      />
                      <div class="status-indicator"></div>
                    </div>
                    <div>
                      <div class="text-truncate">
                        I have the photos that you ordered last month, how would
                        you like them sent to you?
                      </div>
                      <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                      <img
                        class="rounded-circle"
                        src="img/undraw_profile_3.svg"
                        alt="..."
                      />
                      <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                      <div class="text-truncate">
                        Last month's report looks great, I am very happy with
                        the progress so far, keep up the good work!
                      </div>
                      <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                      <img
                        class="rounded-circle"
                        src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                        alt="..."
                      />
                      <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                      <div class="text-truncate">
                        Am I a good boy? The reason I ask is because someone
                        told me that people say this to all dogs, even if they
                        aren't good...
                      </div>
                      <div class="small text-gray-500">
                        Chicken the Dog · 2w
                      </div>
                    </div>
                  </a>
                  <a
                    class="dropdown-item text-center small text-gray-500"
                    href="#"
                    >Read More Messages</a
                  >
                </div>
              </li>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >Usuario</span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="img/undraw_profile.svg"
                  />
                </a>
                <!-- Dropdown - User Information -->
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown"
                >
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
                  <div class="dropdown-divider"></div>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#logoutModal"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tabla de Usuarios</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Alumnos
                </h6>
                <button
                  class="btn btn-primary mb-3"
                  data-toggle="modal"
                  data-target="#modalCrearAlumno"
                >
                  <i class="fas fa-user-plus"></i> Crear Usuario
                </button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="tablaAlumnos"
                    width="100%"
                    cellspacing="0"
                  >
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
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL CREAR ALUMNO -->
    <div
      class="modal fade"
      id="modalCrearAlumno"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modalLabelCrear"
    >
      <div class="modal-dialog" role="document">
        <form id="formCrearAlumno">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabelCrear">Crear Usuario</h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Cerrar"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Nombre</label>
                <input
                  type="text"
                  class="form-control"
                  name="Nombre"
                  required
                />
              </div>
              <div class="form-group">
                <label>Apellido Paterno</label>
                <input
                  type="text"
                  class="form-control"
                  name="ApellidoPaterno"
                  required
                />
              </div>
              <div class="form-group">
                <label>Apellido Materno</label>
                <input
                  type="text"
                  class="form-control"
                  name="ApellidoMaterno"
                  required
                />
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
                  required
                />
              </div>
              <div class="form-group">
                <label>No. Control</label>
                <input
                  type="text"
                  class="form-control"
                  name="Ncontrol"
                  required
                />
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cancelar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- MODAL EDITAR ALUMNO -->
    <div class="modal fade" id="modalEditarAlumno" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <form id="formEditarAlumno">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Editar Usuario</h5>
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="idAlumno" id="edit_idAlumno" />

              <div class="form-group">
                <label>Nombre</label>
                <input
                  type="text"
                  class="form-control"
                  name="Nombre"
                  id="edit_Nombre"
                  required
                />
              </div>
              <div class="form-group">
                <label>Apellido Paterno</label>
                <input
                  type="text"
                  class="form-control"
                  name="ApellidoPaterno"
                  id="edit_ApellidoPaterno"
                  required
                />
              </div>
              <div class="form-group">
                <label>Apellido Materno</label>
                <input
                  type="text"
                  class="form-control"
                  name="ApellidoMaterno"
                  id="edit_ApellidoMaterno"
                  required
                />
              </div>
              <div class="form-group">
                <label>Género</label>
                <select
                  class="form-control"
                  name="Genero"
                  id="edit_Genero"
                  required
                >
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input
                  type="text"
                  class="form-control"
                  name="Telefono"
                  id="edit_Telefono"
                  required
                />
              </div>
              <div class="form-group">
                <label>No. Control</label>
                <input
                  type="text"
                  class="form-control"
                  name="Ncontrol"
                  id="edit_Ncontrol"
                  required
                />
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Actualizar</button>
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
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

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/datatables-demo.js"></script> -->

    <!-- DATOS DE LA BASE DE DATOS -->
    <script></script>

    <script>
      $(document).ready(function () {
        var tabla = $("#tablaAlumnos").DataTable({
          ajax: "php/obtener_alumnos.php",
          columns: [
            { data: "idAlumno" },
            { data: "Nombre" },
            { data: "ApellidoPaterno" },
            { data: "ApellidoMaterno" },
            { data: "Genero" },
            { data: "Telefono" },
            { data: "Ncontrol" },
            {
              data: null,
              render: function (data, type, row) {
                return `
                        <button class="btn btn-warning btn-sm btn-editar" data-id="${row.idAlumno}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm btn-eliminar" data-id="${row.idAlumno}">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
              },
            },
          ],
        });

        // Crear alumno
        $("#formCrearAlumno").on("submit", function (e) {
          e.preventDefault();
          $.ajax({
            url: "php/insertar_alumno.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (res) {
              console.log(res); // 👈 para depurar qué devuelve PHP
              if (res.status === "ok") {
                $("#modalCrearAlumno").modal("hide");
                $("#formCrearAlumno")[0].reset();
                tabla.ajax.reload();
                Swal.fire("¡Alumno creado!", res.msg, "success");
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
        $("#tablaAlumnos tbody").on("click", ".btn-editar", function () {
          var data = tabla.row($(this).parents("tr")).data();

          $("#edit_idAlumno").val(data.idAlumno);
          $("#edit_Nombre").val(data.Nombre);
          $("#edit_ApellidoPaterno").val(data.ApellidoPaterno);
          $("#edit_ApellidoMaterno").val(data.ApellidoMaterno);
          $("#edit_Genero").val(data.Genero);
          $("#edit_Telefono").val(data.Telefono);
          $("#edit_Ncontrol").val(data.Ncontrol);

          $("#modalEditarAlumno").modal("show");
        });

        // Guardar cambios del alumno

        $("#formEditarAlumno").on("submit", function (e) {
          e.preventDefault();
          $.ajax({
            url: "php/editar_alumno.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (res) {
              if (res === "ok") {
                $("#modalEditarAlumno").modal("hide");
                $("#formEditarAlumno")[0].reset();
                tabla.ajax.reload();
                Swal.fire(
                  "¡Actualizado!",
                  "El alumno ha sido modificado.",
                  "success"
                );
              } else {
                Swal.fire("Error", "No se pudo actualizar el alumno.", "error");
              }
            },
          });
        });

        // Guardar cambios
        $("#formEditarUsuario").on("submit", function (e) {
          e.preventDefault();
          $.ajax({
            url: "php/editar_alumno.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (res) {
              if (res === "ok") {
                $("#modalEditarUsuario").modal("hide");
                $("#formEditarUsuario")[0].reset();
                tabla.ajax.reload();
                Swal.fire(
                  "¡Actualizado!",
                  "El alumno ha sido modificado.",
                  "success"
                );
              } else {
                Swal.fire("Error", "No se pudo actualizar el alumno.", "error");
              }
            },
          });
        });

        // Eliminar alumno
        $("#tablaAlumnos tbody").on("click", ".btn-eliminar", function () {
          var data = tabla.row($(this).parents("tr")).data();
          var id = data.idAlumno;

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
                url: "php/eliminar_alumno.php",
                type: "POST",
                data: { idAlumno: id },
                success: function (res) {
                  if (res === "ok") {
                    tabla.ajax.reload();
                    Swal.fire(
                      "¡Eliminado!",
                      "El alumno ha sido eliminado.",
                      "success"
                    );
                  } else {
                    Swal.fire(
                      "Error",
                      "No se pudo eliminar el alumno.",
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
