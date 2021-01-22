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
					Tabla Categorias
				</div>
				<div class="card-body">
					<button class="bt btn-danger">
						<i class="fas fa-id-card-alt fa-6x"></i>
					</button>
					<h2>Categorias</h2>
					<button class="btn btn-primary" data-toggle="modal" data-target="#modalInsertar">
						<span class="fas fa-clipboard-check"></span> Agregar nuevo
					</button>
					<hr>
					<div class="table-responsive">
						<table class="table table-hover" id="tablaload">
							<thead>
								<tr>
									<td align="center">Categoria</td>
									<td align="center">Descripción</td>
									<td align="center">Editar</td>
									<td align="center">Eliminar</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($datos as $key): ?>
									<tr>

										<td align="center"><?php echo $key->categoria ?></td>
										<td align="center"><?php echo $key->descripcion ?></td>
										<td style="text-align: center">
											<a href="<?php echo base_url().'/obtenerNombre/'.$key->id_categoria?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
										</td>
										<td style="text-align: center">
											<a href="<?php echo base_url().'/eliminar/'.$key->id_categoria?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
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

	<!-- Modal -->
	<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> Agregar Categoria </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?php echo base_url().'/crear' ?>">
						<label> Categoria </label>
						<input type="text" name="categoria" id="categoria" class="form-control input-sm" >
						<label> Descripcion </label>
						<input type="text" name="descripcion" id="descripcion" class="form-control input-sm">
						<hr>
						<button type="button" class="btn btn-danger" data-dismiss="modal" >
							<span class="fas fa-times-circle"></span> Cerrar
						</button>
						<button class="btn btn-primary"><span class="fas fa-save"></span> Guardar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idcategoria" name="idcategoria">
						<label> Categoria </label>
						<input type="text" name="categoria1" id="categoria1" class="form-control input-sm">
						<label> Descripcion </label>
						<input type="text" name="descripcion1" id="descripcion1" class="form-control input-sm">
						<hr>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							<span class="fas fa-times-circle"></span> Cerrar
						</button>
						<button class="btn btn-warning"><span class="fas fa-edit"></span>Editar</button>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#tablaload').DataTable();
			} );
		</script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript">
			let mensaje = '<?php echo $mensaje ?>';

			if (mensaje =='1'){
				swal(':D','Agregado con exito','success');

			}else if(mensaje == '0'){
				swal(':(','Fallo al agregar','error');  
			}else if(mensaje == '2'){
				swal(':D','Actualizado con exito','success');  
			}else if(mensaje == '3'){
				swal(':D','Fallo al actualizar','error');  
			} else if(mensaje == '4'){
				swal(':D','Eliminado con exito','success');  
			}else if(mensaje == '5'){
				swal(':D','Fallo al eliminar','error');  
			}
		</script>
	</body>
	</html>