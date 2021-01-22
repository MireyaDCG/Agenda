<?php namespace App\Models;

	use CodeIgniter\Model;

 	class contactossModel extends Model{
 		public function listarContactos(){
 			$Contactos = $this->db->query("SELECT * FROM t_contactos");
 			return $Contactos->getResult();
 		}
 		public function insertar($datos){
 			$Contactos = $this->db->table('t_contactos');
 			$Contactos->insert($datos);

 			return $this->db->insertID();
 		}

 		public function obtenerContactos($data){
 			$Contactos = $this->db->table('t_contactos');
 			$Contactos->where($data);
 			return $Contactos->get()->getResultArray();
 		}

 		public function actualizar($data, $idNombre){
 			$Contactos = $this->db->table('t_contactos');
 			$Contactos->set($data);
 			$Contactos->where('id_categoria',$idNombre);
 			return $Contactos->update();
 		}

 		public function eliminar($data){
 			$Contactos = $this->db->table('t_contactos');
 			$Contactos->where($data);
 			return $Contactos->delete();
 		}
 	}