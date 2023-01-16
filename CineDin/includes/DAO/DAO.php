<?php

class DAO {

		public $mysqli;
		
		public function __construct(){
			if (!$this->mysqli ){				//se crea la conexión
				$this->mysqli = new mysqli('localhost','admin','adminpass','cinedincidan');
				if ( $this->mysqli->connect_errno) {
					echo "Fallo al conectar MySQL:(". $this->mysqli->connect_errno .")".$this->mysqli->connect_error ;
				}
				if(!$this->mysqli->set_charset("utf8")) {
					printf("<hr>Error loading character set utf8 (Err. nº %d): %s\n<hr/>",  $this->mysqli->errno, $this->mysqli->error);
					exit();
				}
				ini_set('default_charset', 'UTF-8');
				if ( !$this->mysqli ) {
					echo "fail";
				}
			}
		}

		public function ejecutarConsulta($sql){
			if($sql != ""){
				$consulta = $this->mysqli->query($sql) or die ($this->mysqli->error. " en la línea ".(__LINE__-1));
				$tablaDatos = array();
				while ($fila = mysqli_fetch_assoc($consulta)){
					array_push($tablaDatos, $fila);
				}
				return $tablaDatos;
			} 
			else {
				return 0;
			}
		}

		public function ejecutarModificacion($sql){
			if($sql != ""){
				$consulta = $this->mysqli->query($sql) or die ($this->mysqli->error. " en la línea ".(__LINE__-1));
				return $this->mysqli->affected_rows;
			} 
			else{
				return 0;
			}
		}

		public function ejecutarInsertado($sql){
			if($sql != ""){
				$consulta = $this->mysqli->query($sql) or die ($this->mysqli->error. " en la línea ".(__LINE__-1));
				return mysqli_insert_id($this->mysqli);
			} 
			else{
				return NULL;
			}
		}
			
}
?>