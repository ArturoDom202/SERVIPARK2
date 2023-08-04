<?php
	date_default_timezone_set('America/Mexico_City');
	

	class vehiculos_Modelo{
		public function __construct(){
			$this->link=Conectar::conexion();
		}	
		public function get_vehiculos(){
			$fechaHoraActual = date("Y-m-d H:i:00");
			
			if(isset($_POST['txt_parametro'])){
			$parametro = $_POST["txt_parametro"];
			
			$sql ="SELECT  * FROM automoviles WHERE hora_salida >' $fechaHoraActual' AND placa LIKE '%$parametro%'";
				
			//echo($sql);
				
			$resultado=$this->link->query($sql);
				
			if($resultado->num_rows > 0){
				while($row= mysqli_fetch_assoc($resultado)){
			 $this->vehiculos[]=$row;
			
			}	
			return $this->vehiculos;
			}else{
			 //echo "<script>alert('No existe el articulo especificado')</script>";
			}
		   		 
			}
		}

	}

?>