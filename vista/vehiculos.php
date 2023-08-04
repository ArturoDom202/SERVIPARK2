<!DOCTYPE html>

</html>
<html>
    <head>
		<meta charset="UTF-8">
		<title>VEHICULOS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <script src="/SERVIPARK/framework/vue.js"> </script>    
		<link href="/SERVIPARK/framework/bootstrap-5.2.0\css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="/SERVIPARK/framework/ventana.css" rel ="stylesheet" type="text/css">
		<link href="/SERVIPARK\fuentes\bootstrap-icons-1.10.5\font/bootstrap-icons.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" type="image/x-icon" href="/SERVIPARK/img/icono.ico">
		
		<?php require_once $_SERVER['DOCUMENT_ROOT']."/SERVIPARK/vista/encabezado.php"; ?>
		
    </head>   
    
    <body background="/SERVIPARK/img/claro.svg">

		<br>
	<form method="post" >
			<div id="ventanaModal">
		<div class="container" style="background-color:rgba(255,252,252,0.95); border-radius: 15px">
			<div class="row">
				<div class="col-md-12" style="text-align: center; padding-top: 1rem; padding-bottom: 1.5rem;"> <span style="font-size: 1.5rem"><b>VEHICULOS ACTIVOS</b></span> </div>
			</div>
			
			<div class="row" style="text-align: center" >
				<div class="col-md-2">
					<b><label style="font-size: 1.3rem; padding-top: 5px;" >Placa:</label></b>
				</div>
				<div class="col-md-8" style="padding-top: 5px">
					<input class="form-control" type="text" name="txt_parametro" placeholder="Ingrese las placas del vehiculo sin guiones"> 
				</div>
				<div class =" col " style="padding-top: 5px">
				<button style=" width: 8rem " class="btn btn-primary bi-search" type="submit"  @click='mostarVentana=false 'name="btn_buscar"> BUSCAR</button>
				</div>
			</div>
			<br>
		<div class="row">
					<div class="col-md-12" style="text-align: center; border-radius: 5px; ">
						<?php
						
						$i=0;
						if(isset($_POST["btn_buscar"])){
						
						$articulos = new vehiculos_Modelo(); 
						$data["vehiculos"] = $articulos-> get_vehiculos();
					

						if($data["vehiculos"]>0){
						echo"<table class='table table-striped' style=' border-radius: 1px; font-size:0.9rem;text-align: center' width='100%' >";
						echo "
								<tr>
								    <th bgcolor='#C2C6EF' align='center'  width='10%' >#</th>
									<th bgcolor='#C2C6EF' align='center'  width='30%' >PLACA</th>
									<th  bgcolor='#C2C6EF' align='center'  width='30%'>HORA DE ENTRADA</t>
									<th  bgcolor='#C2C6EF' align='center'  width='30%'>HORA DE SALIDA</t>

								</tr>";
						foreach($data['vehiculos'] as $dato){
							$i++;
							$placa =  $dato["placa"];
							$entrada =  $dato["hora_entrada"];
							$salida = $dato["hora_salida"];
							
							$aj_entrada = new DateTime($entrada);
							$hora_entrada = $aj_entrada->format('h:i a d-m-Y');
							
							$aj_salida = new DateTime($salida);
							$hora_salida = $aj_salida->format('h:i a d-m-Y');
							
							echo "
								<tr>
								    <td style=''>".$i."</td>
									<td style=''>".$placa."</td>
									<td style=''>".$hora_entrada."</td>
									<td style=''>".$hora_salida."</td>

									
								</tr>";
							// finpara crear tabla 

						}
						}else{
							echo "<script>alert('No existe el vehiculo especificado')</script>";
						}
						echo "</table>";
						
					} 
						?>
					</div>
		
			</div>

        
			
		
		
		
	</form>
	</div>
		<br>
    </body>

   
    
    <footer>


    </footer>    
</html>
