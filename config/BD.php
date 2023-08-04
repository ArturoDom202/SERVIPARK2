<!doctype html>
<html>
<meta charset="utf-8">
</html>
<?php
class bd{
	public function __construct(){
		$this->db=Conectar::conexion();
	}
	
	public function existeRegistro($sql){
		$resultado = $this->db->query($sql); //Ejecuto la consulta
		if($resultado->num_rows > 0){
			$valor = 1;
		}else{
			$valor = 0;
		}
		return $valor;
	}
	public function abc($sql){
			if($this->db->query($sql)==TRUE){
				echo "<script>alert('Se ha realizado el cambio solicitado')</script>";
			}else{
				echo "Error: ".$sql." ".$this->db->error;
			}
			$this->db->close();
		}
	
		public function combo($sql, $id, $des, $No){
			$resultado = $this->db->query($sql);
			while($row=$resultado->fetch_assoc()){
				if($row[$id]<>$No){
					echo '<option value="'.$row[$id].'">'.$row[$des].'</option>';
				}
			}
		}

	public function mostrarCampo($sql, $campo){
		$resultado = $this->db->query($sql); //Ejecuto la consulta
		if($resultado->num_rows > 0){
			while($row=$resultado->fetch_assoc()){
				$valor = $row[$campo];
			}
		}else{
			$valor = "Vacio";
		}
		return $valor;
	}
	
	   public function imprimir_menu($sql,$id_usuario){
        $resultado = $this->db->query($sql);
		 
        if($resultado->num_rows > 0){
            
			while($row = $resultado->fetch_assoc()){
				$nombre = $row['nombre'];
				$icono = $row['icono'];
				$ruta = $row['ruta'];
            echo "		
						<div class='col-md-6' style='text-align: center; padding-top: 1rem; padding-bottom: 1.5rem;'>
						<span><a href='$ruta?id=$id_usuario'><b class='bi $icono' style='font-size: 4rem'></b><br>$nombre</a></span>
						</div>
            ";
            }

            
        }else{
           
        }        
    }
	
	public function corte_negocio($sql){
		
        $resultado = $this->db->query($sql);
		$i=0;
		$total_horas=0;
		$monto_total=0;
		
        if($resultado->num_rows > 0){
           	 echo"<table class='table table-striped' style=' border-radius: 1px; font-size:1rem;text-align: center' width='50%' >";
						echo "
								<tr>
								    <th bgcolor='#C2C6EF' align='center'  width='5%' >#</th>
									<th bgcolor='#C2C6EF' align='center'  width='30%' >FECHA</th>
									<th  bgcolor='#C2C6EF' align='center'  width='20%'>HORAS</t>
									<th  bgcolor='#C2C6EF' align='center'  width='10%'>MONTO</t>
								</tr>";
			
			while($row = $resultado->fetch_assoc()){
				$i++;
				$fecha = $row['fecha'];
				$horas = $row['horas'];
				$monto = $row['monto'];
				$total_horas = $total_horas + $row['horas'];
				$monto_total = $monto_total + $row['monto'];
            echo "
									<tr>
								    <td style=''>".$i."</td>
									<td style=''>".$fecha."</td>
									<td style=''>".$horas."</td>
									<td style=''>$".$monto."</td>
								</tr>";
            }
		  echo "
									<tr>
								    <td style=''></td>
									<td style=''><b>TOTAL:</b></td>
									<td style=''><b>".$total_horas."</b></td>
									<td style=''><b>$".$monto_total."</b></td>
								</tr> </table>";
            
        }else{
           echo "<h5 style='color:red;text-align:center;'>Aun no se han registrado vehículos o el cobro se realizará próximamente</h5>";
        }        
    }
	
	public function imprimir_encabezado($sql,$id_usuario){
        $resultado = $this->db->query($sql);
		$i=1;
        if($resultado->num_rows > 0){
            
			while($row = $resultado->fetch_assoc()){
				
				$nombre = $row['nombre'];
				$des = $row['descripcion'];
				$icono = $row['icono'];
				$ruta = $row['ruta'];
				
            echo '
				<div class="menu_nav" style="padding-left: 80px;padding-top: 20px; width: 500px; font-size: 28px; color: white;" v-on:mouseover="conEnfoqueMouse'.$i.'" v-on:mouseleave="sinEnfoqueMouse'.$i.'">
						<a href="'.$ruta.'?id='.$id_usuario.'"  class="bi '.$icono.'" v-bind:style="{ color: color'.($i+1).' }" style="color: #FFFFFF; text-decoration: none; position: relative;">
							 '.strtoupper($nombre).'
						</a>
						<div class="row" v-if="activo'.$i.'==1" style="z-index: 100; padding-right: 200px; font-size: 20px; width: 500px; transition-property: 10;">
							<span style="text-align: left; padding-bottom: 10px">'.$des.'</span>
						</div>
					</div>
			';
			$i++;
            }
			
					
					
			echo'		<div class="menu_nav" style="padding-left: 80px;padding-top: 20px; width: 600px; font-size: 28px; color: white" v-on:mouseover="conEnfoqueMouse'.$i.'" v-on:mouseleave="sinEnfoqueMouse'.$i.'">
						<a href="/SERVIPARK/" style="color: #FFFFFF; text-decoration: none; position: relative;" class="bi bi-database-lock"v-bind:style="{ color: color'.($i+1).' }">
							CERRAR SESION
						</a>
						<div class="row" v-if="activo'.$i.'==1" style="z-index: 100; padding-right: 200px; font-size: 20px; width: 500px; transition-property: 10;">
							<span style="text-align: left; padding-bottom: 10px">Cierre su cuenta y regrese al login.</span><br>
						</div>
					</div>
			';
            
        }else{
           
        }        
    }
}
?>