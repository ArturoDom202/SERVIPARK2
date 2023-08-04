<!DOCTYPE html>
<link rel="shortcut icon" type="image/x-icon" href="/SERVIPARK/img/icono.ico">
</html>
<html>
    <head>
		<meta charset="UTF-8">
		<title>INICIO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <script src="/SERVIPARK/framework/vue.js"> </script>    
        <link href="/SERVIPARK/fuentes/fonts/fuentes.css" rel ="stylesheet" type="text/css">
		<link href="/SERVIPARK/framework/bootstrap-5.2.0\css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="/SERVIPARK/framework/ventana.css" rel ="stylesheet" type="text/css">
		<link href="/SERVIPARK\fuentes\bootstrap-icons-1.10.5\font/bootstrap-icons.css" rel="stylesheet" type="text/css">
		<?php 
		
		 require_once $_SERVER['DOCUMENT_ROOT']."/SERVIPARK/vista/encabezado.php"; 
		$id=$_GET["id"];
		$bd = new BD();
			
		$sql = "SELECT * FROM usuarios WHERE id_usuario=$id";
			//echo $sql;
		$Nombre_usuario= $bd->mostrarCampo($sql, "nombre");
		$Nivel= $bd->mostrarCampo($sql, "id_nivel");
		
		
	
		?>
		
    </head>   
	  <style>
 
  </style>
    
    <body background="/SERVIPARK/img/claro.svg">
		
		<div class="notification">
			<p >Bienvenido a Servipark, <?php echo ($Nombre_usuario); ?> 👋</p>
			<span class="notification__progress"></span>
		</div>
		
		<br>
	
			<div id="ventanaModal">
		<div class="container" style="background-color:rgba(255,252,252,0.95); border-radius: 15px; width: 70%">
			<br>
			
			<div class="row menu_iconos" style="align-items: center">
				    <div class="col-md-12" style="text-align: center; padding-top: 1rem; padding-bottom: 1.5rem; font-size: 1.5rem">
					<b>BIENVENIDO A SERVIPARK <?php echo strtoupper($Nombre_usuario); ?>!!!</b>
					</div>
				<br>
					<?php
						$bd = new BD();
						$bd->imprimir_menu("SELECT * FROM menus WHERE menus.id_nivel=$Nivel ",$id);					
					?>
					<div class="col-md-6" style="text-align: center; padding-top: 1rem; padding-bottom: 1.5rem;">
					<span><a href="/SERVIPARK/"><b class="bi bi-file-lock-fill"  style="font-size: 3rem"></b><br>Cerrar Sesion</a></span>
					</div>
			</div>
					
			</div>
			
			
			
			
		
			<br>
	
        <!-----------------------------------Ventana de bienvenido-------------------------------->
            <div class="contenedor" v-if="mostarVentana">
				<br>
				<br>
				<br>
                <div class="modal2 container">
                    <div style=" background-color:#3F3A4D; color:white ; padding:5px; border-radius: 10px 10px 10px 10px;text-align: center; height: 45px">
                        <button class="btn close" @click="mostarVentana=false"><b style="color: white">X</b></button>
                        <span style="font-size:20px; text-align: center">BIENVENIDO </span>
                    </div>
                    <div class="contenido">
                        <p>
                            <span style="font-size: 18px; padding-bottom: 15px;">Bienvenido a Servipark, <?php echo ($Nombre_usuario); ?> 👋</span>
							<img src="../img/reloj.gif" height="50px">
							<br>
                            
                        </p>
                        <button class="btn botoncito" @click="mostarVentana=false">Continuar</button>
                    </div>
                </div>    
            </div>

	
	</div>
		<br>
    </body>
		  <script>
        new Vue ({
            el:"#ventanaModal",
            data:{
                
                mostarVentana : false,

            },
			methods:{
			}
        })
    </script> 
</html>