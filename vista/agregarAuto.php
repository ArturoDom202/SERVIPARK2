<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<title>VEHICULOS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/SERVIPARK/framework/vue.js"></script>
	<link href="/SERVIPARK/framework/bootstrap-5.2.0\css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/SERVIPARK\fuentes\bootstrap-icons-1.10.5\font/bootstrap-icons.css" rel="stylesheet" type="text/css">
	<link href="/SERVIPARK/framework/ventana.css" rel ="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/x-icon" href="/SERVIPARK/img/icono.ico">
	<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/SERVIPARK/vista/encabezado.php";
	 date_default_timezone_set('America/Mexico_City');
	$id=$_GET["id"];
		$bd = new BD();
			
		$sql = "SELECT * FROM negocio WHERE id_usuario=$id";
		//echo $sql;
		$nombre_negocio= $bd->mostrarCampo($sql, "descripcion");
		$id_negocio= $bd->mostrarCampo($sql, "id_negocio");
		$flag= $bd->mostrarCampo($sql, "flag");
	?>
</head>

<body background="/SERVIPARK/img/claro.svg">
	<br>
	<form method="post" id="app">
		<div class="container" style="background-color:rgba(255,252,252,0.95); border-radius: 15px; width: 70%">
			<div class="row">
				<div class="col-md-12" style="text-align: center; padding-top: 1.5rem;"> <span style="font-size: 1.5rem"><b>REGISTRO DE VEHICULOS</b></span> </div>
				<div class="col-md-12" style="text-align: left; padding-top: 5px; padding-left: 40px;"> <span style="font-size: 1.2rem"><b><?php echo($nombre_negocio); ?></b></span> </div>
			</div>
			<?php
			if($flag==1){
			echo('
			<div class="row" style="text-align: left; padding-left: 30px; padding-right: 30px;padding-bottom: 50px;v padding-top: 20px;">
				
					<div class="form-row" style="padding-top: 10px">
						<div class=" form-group col-md-12">
							<label>Total de horas:</label>
							<input class="form-control" name="txt_total" type="number" maxlength="10" pattern="[1-9]{10,10}" v-model="totalHoras" @change="calcularHoraSalida"  autofocus @focus="calcularHoraSalida"  required>
							<span v-if="mensajeError" style="color: red;">{{ mensajeError }}</span>
						</div>
					</div>
					<div class="form-row" style="padding-top: 8px">
						<div class=" form-group col-md-12">
							<label>Placa:</label>
							<input class="form-control" name="txt_placa" maxlength="9" type="text" pattern="[A-Z a-z 0-9]{6,9}" placeholder="Ingrese la placa del vehículo sin guiones" required @focus="calcularHoraSalida" > </div>
					</div>
					<div class="form-row" style="padding-top: 8px">
						<div class=" form-group col-md-12">
							<label>Hora entrada:</label>
							<input class="form-control" name="txt_horaEntrada" type="datetime-local" readonly required v-model="fechaHoraEntrada"> </div>
					</div>
					<div class="form-row" style="padding-top: 8px">
						<div class=" form-group col-md-12">
							<label>Hora salida:</label>
							<input class="form-control" name="txt_horaSalida"  type="datetime-local"  readonly required v-model="fechaHoraSalida"  > </div>
					</div>
					<div class="col-md-12" style="padding-top: 20px">
						<label style="font-size: 24px"><b>Cobro: $ {{monto}}</b></label>
					</div>
					
					<div class="col-md-12" style="padding-top:25px">
						<button class="btn btn-primary" @click="conf_agregar=true"  type="button">Guardar</button>
						<a href="/SERVIPARK/controlador/menuControlador.php?id='.$id.'">
						<button class="btn btn-danger" type="button">Cancelar</button>
						</a>
					</div>
			</div>');}
			else{
				
				echo("<h2 style='color:red;text-align:center;padding:30px;'>LO SENTIMOS ESTE NEGOCIO YA NO SE ENCUENTRA ACTIVO</h2>");
			}
			?>
			<!----------------------------------Confirmacion de guardar------------------------------->
			<div class="contenedor" v-if="conf_agregar">
				<br><br><br><br><br><br>
                <div class="modal3 container">
                    
					<div class="contenido" style="text-align: center;padding-top: 5px">
						<h5>¿Esta seguro que desea guardar estos datos?</h5>
						<br>
						<div class="row">
						<div class="col-md-6" style="padding: 5px"><button class="btn btn-primary" type="submit" name="btn_guardar">Aceptar</button></div>
                        <div class="col-md-6" style="padding: 5px"><button class="btn btn-danger"  @click="conf_agregar=false">Cancelar</button></div>
						</div>
                    </div>
					
                </div>    
            </div>
			
	</form>
	</div>
	<br>
	</body>
	
	
	<?php
	if(isset($_POST["btn_guardar"])){
		$modelo = new agregarAutos_Modelo();
		$modelo->grabar($id_negocio,$id);
	}

?>
	 
    <script>
        new Vue({
            el: '#app',
            data: {
                totalHoras: 1,
				conf_agregar: false,
				monto:0,
				mensajeError:'',
                fechaHoraEntrada: obtenerFechaHoraActual(),
                fechaHoraSalida: ''
            },
        methods: {
                calcularHoraSalida() {
                
					if(this.totalHoras<1){
						this.mensajeError='El valor no puede ser negativo cero.';
						this.totalHoras=1;
					}else{
						this.mensajeError='';
						this.monto=this.totalHoras*6
						 const fechaHoraEntradaDate = new Date(this.fechaHoraEntrada);
                    const totalHorasFloat = parseFloat(this.totalHoras);
                    const minutosSumados = totalHorasFloat * 60 + 5;

                    const fechaHoraSalidaDate = new Date(fechaHoraEntradaDate.getTime() + minutosSumados * 60000);
                    this.fechaHoraSalida = formatFechaHora(fechaHoraSalidaDate);
					}
				}
            }

				
        });
		
		
        function obtenerFechaHoraActual() {
            const now = new Date();
            return formatFechaHora(now);
        }

        function formatFechaHora(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            return `${year}-${month}-${day}T${hours}:${minutes}`;
        }
    </script>




</html>

