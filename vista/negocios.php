<!DOCTYPE html>

</html>
<html>
    <head>
		<meta charset="UTF-8">
		<title>NEGOCIOS</title>
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
				<div class="col-md-12" style="text-align: center; padding-top: 1rem; padding-bottom: 1.5rem;"> <span style="font-size: 1.5rem"><b>NEGOCIOS</b></span> </div>
			</div>
			
			<div class="row" style="text-align: center" >
				<div class="col-md-2">
					<b><label style="font-size: 1.3rem; padding-top: 5px;" >Nombre:</label></b>
				</div>
				<div class="col-md-7" style="padding-top: 5px">
					<input class="form-control" type="text" name="txt_parametro" placeholder="Ingrese el nombre, correo o telefono del usuario"> 
				</div>
				<div class =" col " style="padding-top: 5px">
				<button style=" width: 8rem " class="btn btn-primary bi-search" type="submit"  @click='mostarVentana=false 'name="btn_buscar"> BUSCAR</button>
					
				<button style=" width: 8rem " class="btn btn-success bi-clipboard2-plus" type="button"  @click='agregar=true 'name="btn_agregar"> AGREGAR</button>	
				</div>
			</div>
			<br>
		<div class="row">
					<div class="col-md-12" style="text-align: center; border-radius: 5px; ">
						<?php
						$id=$_GET['id'];
						$i=0;
						if(isset($_POST["btn_buscar"])){
						
						$articulos = new negocios_Modelo(); 
						$data["usuarios"] = $articulos-> get_negocios();
					
						
						if($data["usuarios"]>0){
						echo"<table class='table table-striped' style=' border-radius: 1px; font-size:0.95rem;text-align: center' width='100%' >";
						echo "
								<tr>
								    <th bgcolor='#C2C6EF' align='center'  width='5%' >#</th>
									<th bgcolor='#C2C6EF' align='center'  width='30%' >Negocio</th>
									<th  bgcolor='#C2C6EF' align='center'  width='20%'>	Direccion</t>
									<th  bgcolor='#C2C6EF' align='center'  width='10%'>Telefono</t>
									<th  bgcolor='#C2C6EF' align='center'  width='10%'>Encargado</t>
									<th bgcolor='#C2C6EF' align='center'  width='10%'>Modificar</th>
									<th bgcolor='#C2C6EF' align='center'  width='10%'>Eliminar</th>

								</tr>";
						foreach($data['usuarios'] as $dato){
							$i++;
							$descripcion = $dato["descripcion"];
							$encargado = $dato["encargado"];
							$tel = $dato["telefono"];
							$direc = $dato["direccion"];
							$id_neg = $dato["id_negocio"];
							
							$id_negocio =  '"'. $dato["id_negocio"].'"';
							$id_usuario =  '"'. $dato["id_usuario"].'"';
							$telefono = '"'.$dato["telefono"].'"';
							$descripcion = '"'.$dato["descripcion"].'"';
							$direccion = '"'.$dato["direccion"].'"';
							

							//para crear tabla
							echo "
								<tr>
								    <td style=''>".$i."</td>
									<td style=''><a style='text-decoration:none;color:black;' href='/SERVIPARK/controlador/corteNegocioControlador.php?id=$id&id_negocio=$id_neg'>".$descripcion."</a></td>
									<td style=''>".$direc."</td>
									<td style=''>".$tel."</td>
									<td style=''>".$encargado."</td>
									
									<td style=''><button @click='modificar=true,id_negocio=$id_negocio,descripcion=$descripcion,telefono=$telefono,direccion=$direccion,id_usuario=$id_usuario' type='button' class= 'btn bi bi-pencil-square' style='font-size:18px; color:#0000FF;'></button></td>
									
									<td style=''><button
									@click='eliminar=true,id_negocio=$id_negocio,descripcion=$descripcion,direccion=$direccion 'type='button' class= 'btn bi bi-trash3' style='font-size:18px; color:#FF0000; '></button></td>
								</tr>";
							// finpara crear tabla 

						}
						}else{
							echo "<script>alert('No existe el usuario especificado')</script>";
						}
						echo "</table>";
						
					} 
						?>
					</div>
		
			</div>

				<!----------------------------------Ventana de Agregar------------------------------------->
			<div class="contenedor" v-if="agregar">
                <div class="modal2 container">
                    <div style=" background-color:#2286FF ;color:white ; padding:5px; border-radius: 10px 10px 10px 10px;">
                        <button class="btn close"  @click="agregar=false" type="button"><b style="color: white">X</b></button>
                        <span style="font-size:24px">Agregar Negocio</span>
                    
                    </div>
					<div class="contenido" style="text-align: left">
						<div class="form-row" style="padding-top: 10px">
							<div class=" form-group col-md-12">
								<label>Nombre del negocio:</label>
								<input class="form-control" name="txt_nombre"  maxlength="35"  type="text" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ]{3,35}" required >
								
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Direccion:</label>
								<input class="form-control" name="direccion"  maxlength="35"  type="text" pattern="[A-Z 0-9 a-záéíóúÁÉÍÓÚñÑ#]{3,35}" required>
								
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Telefono:</label>
								<input class="form-control" name="telefono"  maxlength="10"  type="text" pattern="[0-9]{9,12}" required>
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Encargado:</label>
								<select class="form-control"  name="cmb_encargado"  required>
									<option value="">
										--seleccione un encargado--
									</option>

									<?php 
										$sql="SELECT CONCAT(nombre, ' ', ape_p, ' ', ape_m) AS encargado, id_usuario FROM usuarios u WHERE id_nivel = 3 AND NOT EXISTS ( SELECT 1 FROM negocio n WHERE n.id_usuario = u.id_usuario ) AND u.flag=1 ";
										$bd= new bd();
										$bd->combo($sql,"id_usuario","encargado","");
									?>
								</select>
							</div>
						</div>
						<br>
						<div class="row" style="padding-top: 5px; text-align: center">
								<div class="col-md-6" style="padding: 5px"><button class="btn btn-primary" @click="conf_agregar=true" type="button" >Guardar</button></div>
                    			<div class="col-md-6" style="padding: 5px"><button class="btn btn-danger"  @click="agregar=false">Cancelar</button></div>
						</div></div>
							
                    </div>
                </div>    
            </div>
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
			<!----------------------------------Ventana de modificar------------------------------------->
			<div class="contenedor" v-if="modificar" >
                <div class="modal2 container">
                    <div style=" background-color:#2286FF ;color:white; padding:5px; border-radius: 10px 10px 10px 10px;">
                        <button class="btn close"  @click="modificar=false" type="button"><b style="color: white">X</b></button>
                        <span style="font-size:24px">Modificar Usuario</span>
                    </div>
					<div class="contenido" style="text-align: left">
						<div class="form-row" style="padding-top: 10px">
								<label>	ID:</label>
								<input class="form-control" name="txt_id" v-model="id_negocio" type="text"  readonly >	
						</div>
						<div class="form-row" style="padding-top: 10px">
							<div class=" form-group col-md-12">
								<label>Nombre del negocio:</label>
								<input class="form-control" name="txt_nombre2" v-model="descripcion"  maxlength="35"  type="text" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ]{3,35}" required >
								
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Direccion:</label>
								<input class="form-control" name="direccion2" v-model="direccion"   maxlength="35"  type="text" pattern="[A-Z 0-9 a-záéíóúÁÉÍÓÚñÑ#]{3,35}" required>
								
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Telefono:</label>
								<input class="form-control" name="telefono2" v-model="telefono"  maxlength="10"  type="text" pattern="[0-9]{9,12}" required>
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Encargado:</label>
								<select class="form-control"  name="cmb_encargado2"  v-model="id_usuario" required>
					
									<option v-for="option in options":value="option.value">
										{{option.label}}
									</option>

									<?php 
										$sql="SELECT CONCAT(nombre, ' ', ape_p, ' ', ape_m) AS encargado, id_usuario
										FROM usuarios WHERE flag=1 AND id_nivel=3";
										$bd= new bd();
										$bd->combo($sql,"id_usuario","encargado","");
									?>
								</select>
							</div>
						</div>
						<br>
						<button class="btn btn-primary" @click="conf_modificar=true" type="button" >Guardar</button>
						
                        <button class="btn btn-danger"  @click="modificar=false"  type="button" >Cancelar</button>
                    </div>
                </div>    
            </div>
			<!----------------------------------Confirmacion de modificar------------------------------->
				<div class="contenedor" style="scroll-behavior: auto" v-if="conf_modificar">
				<br><br><br><br><br><br>
                <div class="modal3 container">
                    
					<div class="contenido" style="text-align: center;padding-top: 5px">
						<h5>¿Esta seguro que desea modificar estos datos?</h5>
						<br>
						<button class="btn btn-primary" name="btn_modificar">Aceptar</button>
                        <button class="btn btn-danger"  @click="conf_modificar=false"  type="button" >Cancelar</button>
                    </div>
                </div>    
            </div>
		<!-----------------------------------------Ventana de eliminar------------------------------------------------------>
				<div class="contenedor" v-if="eliminar">
				<br>
                <div class="modal2 container" >
                    <div style="background-color:#2286FF;color:white; padding:5px; border-radius: 10px 10px 10px 10px;">
                        <button class="btn close"  @click="eliminar=false" type="button"><b style="color: white">X</b></button>
                        <span style="font-size:24px">Eliminar Negocio</span>
                    </div>
					
					<div class="contenido" style="text-align: center">
						<input class="form-control" name="txt_id" v-model="id_negocio" type="hidden"  style="width: 50px">
						<div class="form-row" style="padding-top: 10px; text-align: center">
						<span style="font-size: 18px"><b><p style="font-size: 20px">Desea eliminar al negocio:</p> {{descripcion}} , {{direccion}} , ID: {{id_negocio}} </b></span>
						<br>	
						<br>
						<button class="btn btn-primary" @click="conf_eliminar=true" type="button"  >Aceptar</button>
                        <button class="btn btn-danger" @click="eliminar=false"  type="button" >Cancelar</button>
                    </div>
                </div>    
            </div>
        </div>
			<!----------------------------------Confirmacion de eliminar------------------------------->
				<div class="contenedor" style="scroll-behavior: auto" v-if="conf_eliminar">
				<br><br><br><br><br><br>
                <div class="modal3 container">
                    
					<div class="contenido" style="text-align: center;padding-top: 5px">
						<h5>¿Esta seguro que desea eliminar estos datos?</h5>
						<br>
						<button class="btn btn-primary" name="btn_eliminar">Aceptar</button>
                        <button class="btn btn-danger"  @click="conf_eliminar=false"  type="button" >Cancelar</button>
                    </div>
                </div>    
            </div>
			
		
		
		
	</form>
	</div>
		<br>
    </body>
<?php
	if(isset($_POST["btn_guardar"])){
		$modelo = new negocios_Modelo();
		$modelo->grabar();
	}
		if(isset($_POST["btn_modificar"])){
		$modelo = new negocios_Modelo();
		$modelo->modificar();
	}
		if(isset($_POST["btn_eliminar"])){
		$modelo = new negocios_Modelo();
		$modelo->eliminar();
	}
?>
    <script>
        new Vue ({
            el:"#ventanaModal",
            data:{
               
				id_usuario:"",
				id_negocio:"",
				descripcion:"",
				dirrecion:"",
				telefono:"",
				encargado:"",
				agregar : false,
				conf_agregar : false,
				conf_modificar : false,
				conf_eliminar : false,
				modificar : false,
				eliminar : false
            },
			methods:{
			}
        })
    </script>  
    
    <footer>


    </footer>    
</html>
