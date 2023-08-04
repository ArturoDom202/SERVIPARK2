<?php
	class agregarAutos_Modelo{
		public function __construct(){
			$this->link=Conectar::conexion();
		}
		
			public function grabar($id_negocio,$id){
			$bd = new bd();
			$placa = strtoupper( $_POST["txt_placa"]);
			$hora_entrada = $_POST["txt_horaEntrada"];
			$hora_salida = $_POST["txt_horaSalida"];
			$total_horas = $_POST["txt_total"];
			
			$sql = "INSERT INTO automoviles VALUES(null,'$placa' ,'$hora_entrada' ,'$hora_salida' ,'$id_negocio','$total_horas','1')";
			//echo $sql;
			$bd->abc($sql);	
			echo "<meta http-equiv=\"refresh\" content=\"0; url=../controlador/menuControlador.php?id=$id\">\r\n";
		}
		

	}

?>