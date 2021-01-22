<?php namespace App\Controllers;
use App\Models\categoriasModel;
use App\Models\CrudModel;
class Home extends BaseController
{
	public function index()
	{
		return view('inicio');
	}

	public function categoria(){
		$Crud = new categoriasModel();
		$datos = $Crud->listarCategoria();

		$mensaje = session('mensaje');

		$data = [
					"datos" => $datos,
					"mensaje" => $mensaje
				];
		return view('categoria', $data);
	}

	public function crear(){
		$datos = [
					"categoria" => $_POST['categoria'],
					"descripcion" => $_POST['descripcion']
				];
		$Crud = new categoriasModel();
		$respuesta = $Crud->insertar($datos);

		if ($respuesta > 0){
			return redirect()->to(base_url().'/Categorias')->with('mensaje','1');
		}else{
			return redirect()->to(base_url().'/Categorias')->with('mensaje','0');
		}

	}

	public function actualizar(){
		$datos = [
					"categoria" => $_POST['categoria'],
					"descripcion" => $_POST['descripcion']
				 ];
		$idNombre =  $_POST['idNombre'];

		$Crud = new categoriasModel();

		$respuesta = $Crud->actualizar($datos, $idNombre);

		if ($respuesta){
			return redirect()->to(base_url().'/Categorias')->with('mensaje','2');
		}else{
			return redirect()->to(base_url().'/Categorias')->with('mensaje','3');
		}
	}

	public function obtenerNombre($idNombre){
		$data = ["id_categoria" => $idNombre];
		$Crud = new categoriasModel();
		$respuesta = $Crud->obtenerCategoria($data);

		$datos = ["datos"=>$respuesta];

		return view('actualizarcat', $datos);
	}

	public function eliminar($idNombre){
		$Crud = new categoriasModel();
		$data = ["id_categoria" => $idNombre];

		$respuesta = $Crud->eliminar($data);

		if ($respuesta){
			return redirect()->to(base_url().'/Categorias')->with('mensaje','4');
		}else{
			return redirect()->to(base_url().'/Categorias')->with('mensaje','5');
		}
	}

	public function actualizarcat(){
		return view('actualizarcat');
	}

	public function contactos(){
		return view('contactos');
	}
	//--------------------------------------------------------------------

}
