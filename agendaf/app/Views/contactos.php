<!DOCTYPE html>
<html>
<head>
	<title>Datatable</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('datatable/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('fontawesome/css/all.css') ?>">
	<script src="<?php echo base_url('js/jquery-3.5.1.min.js') ?>"></script>
	<script src="<?php echo base_url('bootstrap/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('bootstrap/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('datatable/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('datatable/dataTables.bootstrap4.min.js') ?>"></script>	
</head>
<body background="<?php echo base_url('fondo.jpg') ?>">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-primary">
			<a class="navbar-brand" href="#"><i class="fas fa-id-card fa-6x"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url('/') ?>">Inicio <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('/Categorias') ?>">Categoria</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('/Contactos') ?>">Contactos</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>
		<hr>
		<div class="row">
			<div class="col-sm-12" style="background-color: #FFFFFF;">
				<div class="card-header">
					Tabla Contactos
				</div>
				<div class="card-body">
					<button class="bt btn-danger">
						<i class="fas fa-id-card fa-7x"></i>
					</button>
					<h2>Agenda</h2>
					<br>
					<button class="btn btn-primary" data-toggle="modal" data-target="#modalInsertar">
						<span class="fas fa-user-plus"></span> Agregar nuevo
					</button>
					<hr>
					<div class="table-responsive">
						<table class="table table-hover" id="tablaload">
							<thead>
								<td align="center">Id agenda</td>
								<td align="center">Nombre</td>
								<td align="center">Apellido Paterno</td>
								<td align="center">Apellido Materno</td>
								<td align="center">Telefono</td>
								<td align="center">E-mail</td>
								<td align="center">Categoria</td>
								<td align="center">Editar</td>
								<td align="center">Eliminar</td>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer text-muted">
					Ricardo Hernandez Ramirez Programacion PhP con MVC 8S2
				</div>
			</div>
		</div>
	</div>
	<!-- Modal agregar-->
	<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> Agregar Contacto </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formulario">
						<label> Nombre </label>
						<input type="text" name="nombre" id="nombre" class="form-control input-sm" required="">
						<label> Apellido Paterno </label>
						<input type="text" name="paterno" id="paterno" class="form-control input-sm" required="">
						<label> Apellido Materno </label>
						<input type="text" name="materno" id="materno" class="form-control input-sm" required="">
						<label> Telefono </label>
						<input type="text" name="telefono" id="telefono" class="form-control input-sm" required="">
						<label> E-mail </label>
						<input type="text" name="email" id="email" class="form-control input-sm" required="">
						<label>Categoria</label>
						<select name="id_categoria" id="id_categoria" class="form-control">
							<option disabled selected>Escoje categoria</option>
						</select>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal" >
						<span class="fas fa-times-circle"></span> Cerrar
					</button>
					<button type="button" id="btnnuevo" class="btn btn-primary">
						<span class="fas fa-save"></span> Guardar
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal actualizar -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar datos de contacto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idjuego" name="idjuego">
						<label> Nombre </label>
						<input type="text" name="nombre1" id="nombre1" class="form-control input-sm">
						<label> Apellido Paterno </label>
						<input type="text" name="paterno1" id="paterno1" class="form-control input-sm">
						<label> Apellido Materno </label>
						<input type="text" name="materno1" id="materno1" class="form-control input-sm">
						<label> Telefono </label>
						<input type="text" name="telefono1" id="telefono1" class="form-control input-sm">
						<label> E-mail </label>
						<input type="text" name="email1" id="email1" class="form-control input-sm">
						<label> Contacto </label>
						<select name="id_categoria1" id="id_categoria1" class="form-control">
						</select>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						<span class="fas fa-times-circle"></span> Cerrar
					</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">
						<span class="fas fa-edit"></span> Actualizar
					</button>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#tablaload').DataTable();
			} );
		</script>
	</body>
	</html>