<?php
	class negocios_Modelo{
		public function __construct(){
			$this->link=Conectar::conexion();
		}
	
		public function get_negocios(){
			if(isset($_POST['txt_parametro'])){
			$parametro = $_POST["txt_parametro"];
			
			$sql ="SELECT id_negocio,negocio.descripcion,negocio.telefono, negocio.direccion,negocio.id_usuario,usuarios.id_usuario,CONCAT(usuarios.nombre,' ',usuarios.ape_p,' ',usuarios.ape_m)AS encargado,negocio.flag FROM usuarios,negocio WHERE CONCAT(usuarios.nombre,usuarios.ape_p,usuarios.ape_m,descripcion,direccion,negocio.telefono) LIKE '%$parametro%'  AND usuarios.id_usuario=negocio.id_usuario AND negocio.flag=1";
			
				
			$resultado=$this->link->query($sql);
				
			if($resultado->num_rows > 0){
				while($row= mysqli_fetch_assoc($resultado)){
			 $this->articulos[]=$row;
			
			}	
			return $this->articulos;
			}else{
			 //echo "<script>alert('No existe el articulo especificado')</script>";
			}
		   		 
			}
		}
			public function grabar(){
			$bd = new bd();
			$nombre = $_POST["txt_nombre"];
			$direccion = $_POST["direccion"];
			$telefono = $_POST["telefono"];
			$encargado = $_POST["cmb_encargado"];
			$sql = "INSERT INTO negocio  VALUES(null,'$encargado' ,'$direccion' ,'$telefono' ,'$nombre','1')";
			//echo $sql;
			$bd->abc($sql);	
		}
		
			public function modificar(){
			$bd = new bd();
			$id = $_POST["txt_id"];
			$nombre = $_POST["txt_nombre2"];
			$direccion = $_POST["direccion2"];
			$telefono = $_POST["telefono2"];
			$encargado = $_POST["cmb_encargado2"];
			$sql = "UPDATE negocio SET id_usuario='$encargado' ,direccion='$direccion' ,telefono='$telefono' ,descripcion='$nombre'  WHERE id_negocio='$id'";
			echo $sql;
			//$bd->abc($sql);	
		}
			public function eliminar(){
			$bd = new bd();
			$id = $_POST["txt_id"];
			$sql = "UPDATE negocio SET flag=0 WHERE id_negocio='$id'";
			//echo $sql;
			$bd->abc($sql);	
		}
	}

?>