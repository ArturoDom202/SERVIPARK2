<?php
	class Conectar{
		public static function conexion(){
			$servidor = "localhost";
			$usuario= "root";
			$pass="";
			$bd="servipark";
			$link = new MySQLi($servidor, $usuario,$pass,$bd);

			if(mysqli_connect_errno()){
				//Si se produce un error
				echo "Conexión fallida: ".mysqli_connect_error();
			}else{
			//	echo "Bienvenido";
			}
			return $link;
		} 	
	}

//	Conectar::conexion();
?>