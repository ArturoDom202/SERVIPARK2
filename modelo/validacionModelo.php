<?php
	class validacion_Model{
		public function __construct(){
			$this->var_conexion=Conectar::conexion();
			
			if(!isset($_SESSION)){
				//session_start();
			}
			
		}
		
		public function validar(){
			//$id_usuario = $_GET["id"];
			$correo = $_POST["txt_email"];
			$pass = $_POST["txt_password"];
			
			$bd = new BD();
			
			$sql = "SELECT * FROM usuarios WHERE ((correo = '$correo' AND pass='$pass') OR (telefono = '$correo' AND pass='$pass'))AND flag=1";
			//echo $sql;
			$id= $bd->mostrarCampo($sql, "id_usuario");
			
			
			if($bd->existeRegistro($sql)>0){
				$resultado = "encontrado";
				//echo "<script>alert('Bienvenido al sistema')</script>";
				echo "<meta http-equiv=\"refresh\" content=\"0; url=/SERVIPARK/controlador/menuControlador.php?id=$id \">\r\n";
			}else{
				$resultado = "no encontrado...";
				//echo "<script>alert('El Usuario/Contraseña no existe en la BD')</script>";
				echo "<script>alert('El Usuario/Contraseña es incorrecto')</script>";
			}
			//echo "<meta http-equiv=\"refresh\" content=\"0; url=../controllers/clienteControlador.php\">\r\n";
			return $resultado;
		}
		
	}

?>