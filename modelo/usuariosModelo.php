<?php
	class usuarios_Modelo{
		public function __construct(){
			$this->link=Conectar::conexion();
		}
		public function mostrarNombre(){
			$criterio= $_GET["id_art"];
            $bd = new bd();
            $sql = "SELECT * FROM articulo WHERE id_articulo='$criterio'";
            return $bd->mostrarCampo($sql, "descripcion");
		}
		
		public function get_usuarios(){
			if(isset($_POST['txt_parametro'])){
			$parametro = $_POST["txt_parametro"];
			
			$sql ="SELECT id_usuario,nombre,ape_p,ape_m,correo,telefono,usuarios.id_nivel,nivel.id_nivel,nivel.descripcion,pass,flag , CONCAT(nombre,' ',ape_p,' ',ape_m) AS nombrex FROM usuarios,nivel WHERE CONCAT(nombre,ape_p,ape_m,correo,nivel.descripcion,telefono) LIKE '%$parametro%' AND usuarios.id_nivel=nivel.id_nivel AND flag=1";
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
			$ape_p = $_POST["txt_ape_p"];
			$ape_m = $_POST["txt_ape_m"];
			$correo = $_POST["txt_correo"];
			$tel = $_POST["txt_tel"];
			$nivel = $_POST["cmb_nivel"];
			$pass = $_POST["txt_pass"];
			$sql = "INSERT INTO usuarios  VALUES(null,'$nombre' ,'$ape_p' ,'$ape_m' ,'$correo','$tel','$pass',1,'$nivel')";
			//echo $sql;
			$bd->abc($sql);	
		}
		
			public function modificar(){
			$bd = new bd();
			$id = $_POST["txt_id"];
			$nombre = $_POST["txt_nombre2"];
			$ape_p = $_POST["txt_ape_p2"];
			$ape_m = $_POST["txt_ape_m2"];
			$correo = $_POST["txt_correo2"];
			$tel = $_POST["txt_tel2"];
			$nivel = $_POST["cmb_nivel2"];
			$pass = $_POST["txt_pass2"];
			$sql = "UPDATE usuarios SET nombre='$nombre' ,ape_p='$ape_p' ,ape_m='$ape_m' ,correo='$correo' ,telefono='$tel',pass='$pass',id_nivel='$nivel' WHERE id_usuario='$id'";
			//echo $sql;
			$bd->abc($sql);	
		}
			public function eliminar(){
			$bd = new bd();
			$id = $_POST["txt_id"];
			$sql = "UPDATE usuarios SET flag=0 WHERE id_usuario='$id'";
			//echo $sql;
			$bd->abc($sql);	
		}
	}

?>