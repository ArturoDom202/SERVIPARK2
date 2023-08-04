<!DOCTYPE html>

</html>
<html>
    <head>
		<meta charset="UTF-8">
		<title>USUARIOS</title>
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
				<div class="col-md-12" style="text-align: center; padding-top: 1rem; padding-bottom: 1.5rem;"> <span style="font-size: 1.5rem"><b>USUARIOS</b></span> </div>
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
						
						$i=0;
						if(isset($_POST["btn_buscar"])){
						
						$articulos = new usuarios_Modelo(); 
						$data["usuarios"] = $articulos-> get_usuarios();
					
						
						if($data["usuarios"]>0){
						echo"<table class='table table-striped' style=' border-radius: 1px; font-size:0.9rem;text-align: center' width='100%' >";
						echo "
								<tr>
								    <th bgcolor='#C2C6EF' align='center'  width='5%' >#</th>
									<th bgcolor='#C2C6EF' align='center'  width='30%' >Nombre</th>
									<th  bgcolor='#C2C6EF' align='center'  width='20%'>Correo</t>
									<th  bgcolor='#C2C6EF' align='center'  width='10%'>Telefono</t>
									<th  bgcolor='#C2C6EF' align='center'  width='10%'>Nivel</t>
									<th bgcolor='#C2C6EF' align='center'  width='10%'>Modificar</th>
									<th bgcolor='#C2C6EF' align='center'  width='10%'>Eliminar</th>

								</tr>";
						foreach($data['usuarios'] as $dato){
							$i++;
							$id_usuario =  '"'. $dato["id_usuario"].'"';
							$id_nivel =  '"'. $dato["id_nivel"].'"';
							$nivel = $dato["descripcion"];
							$nombrex = $dato["nombrex"];
							$tel = $dato["telefono"];
							$telefono = '"'.$dato["telefono"].'"';
							$nombre = '"'.$dato["nombre"].'"';
							$ape_p = '"'.$dato["ape_p"].'"';
							$ape_m = '"'.$dato["ape_m"].'"';
							$correo = '"'.$dato["correo"].'"';
							$email = $dato["correo"];
							$pass = '"'.$dato["pass"].'"';
							
							//echo $descripcion."<br>";

							//para crear tabla
							echo "
								<tr>
								    <td style=''>".$i."</td>
									<td style=''>".$nombrex."</td>
									<td style=''>".$email."</td>
									<td style=''>".$tel."</td>
									<td style=''>".$nivel."</td>
									
									<td style=''><button @click='modificar=true,id_usuario=$id_usuario,nombre=$nombre,ape_p=$ape_p,ape_m=$ape_m,correo=$correo,pass=$pass,id_nivel=$id_nivel,tel=$telefono' type='button' class= 'btn bi bi-pencil-square' style='font-size:18px; color:#0000FF;'></button></td>
									
									<td style=''><button
									@click='eliminar=true,id_usuario=$id_usuario,nombre=$nombre,ape_p=$ape_p,ape_m=$ape_m 'type='button' class= 'btn bi bi-trash3' style='font-size:18px; color:#FF0000; '></button></td>
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

        <!-----------------------------------Ventana de bienvenido-------------------------------->
            <div class="contenedor" v-if="mostarVentana">
				<br>
                <div class="modal2 container">
                    <div style=" background-color:blue; color:white ; padding:5px;  border-radius: 10px 10px 10px 10px;">
                        <button class="btn close" @click="mostarVentana=false"><b style="color: white">X</b></button>
                        <span style="font-size:24px">Sistema de Ventas</span>
                    
                    </div>
                    <div class="contenido">
                        <p>
                            <span style="font-size: 24px; padding-bottom: 15px;">Bienvenidos al sistema desarrollado por ITIsoft</span>
							<br>
                            Esta es una prueba de las ventanas modales con Vue y CSS .
                        </p>
                        <button class="btn botoncito" @click="mostarVentana=false">Continuar</button>
                    </div>
                </div>    
            </div>
				<!----------------------------------Ventana de Agregar------------------------------------->
			<div class="contenedor" v-if="agregar">
                <div class="modal2 container">
                    <div style=" background-color:#2286FF ;color:white ; padding:5px; border-radius: 10px 10px 10px 10px;">
                        <button class="btn close"  @click="agregar=false" type="button"><b style="color: white">X</b></button>
                        <span style="font-size:24px">Agregar Usuario</span>
                    
                    </div>
					<div class="contenido" style="text-align: left">
						<div class="form-row" style="padding-top: 10px">
							<div class=" form-group col-md-12">
								<label>Nombre:</label>
								<input class="form-control" name="txt_nombre"  maxlength="35"  type="text" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ]{3,35}" required >
								
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Apellido paterno:</label>
								<input class="form-control" name="txt_ape_p"  maxlength="35"  type="text" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ]{3,35}" required>
								
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Apellido materno:</label>
								<input class="form-control" name="txt_ape_m"  maxlength="35"  type="text" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ]{3,35}" required>
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Correo:</label>
								<input class="form-control" name="txt_correo"  maxlength="50"  type="email" pattern="[A-Za-z0-9@_.-]{13,35}" required>
							</div>
						</div>
						<div class="form-row" style="padding-top: 10px">
							<div class=" form-group col-md-12">
								<label>Telefono:</label>
								<input class="form-control" name="txt_tel"   type="tel" maxlength="10" pattern="[0-9]{10,10}" required>
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Nivel:</label>
								<select class="form-control"  name="cmb_nivel"  required>
									<option value="">
										--seleccione un nivel--
									</option>

									<?php 
										$sql="SELECT*FROM nivel";
										$bd= new bd();
										$bd->combo($sql,"id_nivel","descripcion","");
									?>
								</select>
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Contraseña:</label>
								<input class="form-control" name="txt_pass"  maxlength="4"  type="text" required>
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
								<input class="form-control" name="txt_id" v-model="id_usuario" type="text"  readonly >	
						</div>
						<div class="form-row" style="padding-top: 10px">
							<div class=" form-group col-md-12">
								<label>Nombre:</label>
								<input class="form-control" name="txt_nombre2" v-model="nombre" type="text" maxlength="35" pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ]{3,35}" required >
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Apellido paterno:</label>
								<input class="form-control" name="txt_ape_p2"  v-model="ape_p" type="text" maxlength="35"  pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ]{3,35}" required>
								
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Apellido materno:</label>
								<input class="form-control" name="txt_ape_m2" v-model="ape_m" type="text" maxlength="35"  pattern="[A-Z a-záéíóúÁÉÍÓÚñÑ]{3,35}" required>
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Correo:</label>
								<input class="form-control" name="txt_correo2" v-model="correo" type="text" maxlength="50"  pattern="[A-Za-z0-9@_.-]{13,35}" required>
							</div>
						</div>
						<div class="form-row" style="padding-top: 10px">
							<div class=" form-group col-md-12">
								<label>Telefono:</label>
								<input class="form-control" name="txt_tel2" v-model="tel"  type="tel" maxlength="10"  pattern="[0-9]{10,10}" required>
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Nivel:</label>
								<select class="form-control"  name="cmb_nivel2"  v-model="id_nivel" required>
					
									<option v-for="option in options":value="option.value">
										{{option.label}}
									</option>

									<?php 
										$sql="SELECT*FROM nivel";
										$bd= new bd();
										$bd->combo($sql,"id_nivel","descripcion","");
									?>
								</select>
							</div>
						</div>
						<div class="form-row" style="padding-top: 15px">
							<div class=" form-group col-md-12">
								<label>Contraseña:</label>
								<input class="form-control" name="txt_pass2" v-model="pass" type="text" maxlength="4" required>
							</div>
						</div>
						<br>
						<button class="btn btn-primary" @click="conf_modificar=true" type="button" >Guardar</button>
						
                        <button class="btn btn-danger"  @click="modificar=false">Cancelar</button>
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
                        <button class="btn btn-danger"  @click="conf_modificar=false">Cancelar</button>
                    </div>
                </div>    
            </div>
		<!-----------------------------------------Ventana de eliminar------------------------------------------------------>
				<div class="contenedor" v-if="eliminar">
				<br>
                <div class="modal2 container" >
                    <div style="background-color:#2286FF;color:white; padding:5px; border-radius: 10px 10px 10px 10px;">
                        <button class="btn close"  @click="eliminar=false" type="button"><b style="color: white">X</b></button>
                        <span style="font-size:24px">Eliminar Usuario</span>
                    </div>
					
					<input class="form-control" name="txt_id" v-model="id_usuario" type="hidden"  >
					
					<div class="contenido" style="text-align: center">
						<input class="form-control" name="txt_id" v-model="id_usuario" type="hidden" disabled style="width: 50px">
						<div class="form-row" style="padding-top: 10px; text-align: center">
						<span style="font-size: 18px"><b><p style="font-size: 20px">Desea eliminar al usuario:</p> {{nombre}} {{ape_p}} {{ape_m}}  , ID: {{id_usuario}} </b></span>
						<br>	
						<br>
						<button class="btn btn-primary" @click="conf_eliminar=true" type="button"  >Aceptar</button>
                        <button class="btn btn-danger" @click="eliminar=false">Cancelar</button>
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
                        <button class="btn btn-danger"  @click="conf_eliminar=false">Cancelar</button>
                    </div>
                </div>    
            </div>
			
		
		
		
	</form>
	</div>
		<br>
    </body>
<?php
	if(isset($_POST["btn_guardar"])){
		$modelo = new usuarios_Modelo();
		$modelo->grabar();
	}
		if(isset($_POST["btn_modificar"])){
		$modelo = new usuarios_Modelo();
		$modelo->modificar();
	}
		if(isset($_POST["btn_eliminar"])){
		$modelo = new usuarios_Modelo();
		$modelo->eliminar();
	}
?>
    <script>
        new Vue ({
            el:"#ventanaModal",
            data:{
                mensaje:"Hola Muñdo...",
				id_usuario:"",
				id_nivel:"",
				nombre:"",
				ape_p:"",
				ape_m:"",
				correo:"",
				pass:"",
				tel:"",
                mostarVentana : false,
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
