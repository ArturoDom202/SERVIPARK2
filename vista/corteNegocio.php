<!DOCTYPE html>
<link rel="shortcut icon" type="image/x-icon" href="/SERVIPARK/img/icono.ico">
</html>
<html>
    <head>
		<meta charset="UTF-8">
		<title>CORTE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 
        <link href="/SERVIPARK/fuentes/fonts/fuentes.css" rel ="stylesheet" type="text/css">
		<link href="/SERVIPARK/framework/bootstrap-5.2.0\css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="/SERVIPARK\fuentes\bootstrap-icons-1.10.5\font/bootstrap-icons.css" rel="stylesheet" type="text/css">
		<?php 
		
		 require_once $_SERVER['DOCUMENT_ROOT']."/SERVIPARK/vista/encabezado.php"; 
		$id=$_GET["id"];
		$bd = new BD();
			
		$sql = "SELECT * FROM usuarios WHERE id_usuario=$id";
			//echo $sql;
		$Nombre_usuario= $bd->mostrarCampo($sql, "nombre");
		$Nivel= $bd->mostrarCampo($sql, "id_nivel");
		
		
		if(isset($_GET["id_negocio"])){
			$id_negocio=$_GET["id_negocio"];
			$bd = new BD();
			$sql2 = "SELECT * FROM negocio WHERE id_negocio=$id_negocio";
			$nombre_negocio= $bd->mostrarCampo($sql2, "descripcion");
		}else{
			$bd = new BD();
			$sql2 = "SELECT * FROM negocio WHERE id_usuario=$id";
			//echo $sql;
			$nombre_negocio= $bd->mostrarCampo($sql2, "descripcion");
			$id_negocio= $bd->mostrarCampo($sql2, "id_negocio");
		}
		
		

		?>
		
    </head>   
	  <style>
 
  </style>
    
    <body background="/SERVIPARK/img/claro.svg">
		
		
		<br>
		<form method="post">
		<div class="container" style="background-color:rgba(255,252,252,0.95); border-radius: 15px">
			<br>
			
			<div class="row" style="align-items: center">
				    <div class="col-md-12" style="text-align: center; padding-top: 1rem; padding-bottom: 1rem; font-size: 1.5rem">
					<b>CORTE DE CAJA <?php echo strtoupper($nombre_negocio); ?></b>
				</div>
					
			</div>
			<div class="row">
				<div class="col-md-12" style="padding-left: 40px; padding-right: 40px; padding-bottom: 10px">
							<?php
								$bd = new BD();
								$bd->corte_negocio("SELECT CAST(hora_entrada AS DATE) AS fecha, total_horas AS horas, (total_horas*15) AS monto FROM automoviles WHERE id_negocio=$id_negocio AND flag=1 ORDER BY hora_entrada ");	
								$bd = new BD();

								$sql = "SELECT  SUM(total_horas)AS totalHoras, SUM(total_horas)*15 AS montoTotal FROM automoviles WHERE id_negocio=$id_negocio AND flag=1";
								$monto_total= $bd->mostrarCampo($sql, "montoTotal");
								$totalHoras= $bd->mostrarCampo($sql, "totalHoras");
							?>
							
       
				</div>
			</div>
			
			<?php 
			if(isset($Nivel)&& $Nivel==1){
			
			echo('<div class="row">
				<div class="col-md-12" style="padding-left: 40px; padding-top: 5px; padding-bottom: 30px">
					<button v-if="Nivel === 2" class="btn btn-primary" type="submit" name="btn_guardar">Generar Reporte</button>
				</div>
			</div>');
						
			}
			?>
			
           </div>
	</form>
    </body>
  
</html>