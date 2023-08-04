<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="../img/icono.ico">

 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/SERVIPARK/framework/bootstrap-5.2.0\css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/SERVIPARK/framework/ventana.css" rel="stylesheet" />
<link href="/SERVIPARK/framework/Menu/styles.css" rel="stylesheet" />
  <script src="/SERVIPARK/framework/vue.js"></script>
	
	
</head>
	
<?php 
	$id=$_GET['id'];
	
	$bd = new BD();
			
	$sql = "SELECT * FROM usuarios WHERE id_usuario=$id";
			//echo $sql;
	$Nombre_usuario= $bd->mostrarCampo($sql, "nombre");
	$Nivel= $bd->mostrarCampo($sql, "id_nivel");
		
	
	?>	
<style type="text/css">
#menu-link a:link {
		color:#9E9E9E;
		text-decoration: none;
	}

	#menu-link a:visited {
		color:#000;
		text-decoration: none;
	}

	#menu-link a:hover {
		color:#FF8385;
		text-decoration: none;
	}

	#menu-link a:active {
		color:#A179D3;
		text-decoration: none;
	}
</style>

<body >
	<div id="codigoVue2" >
	<div class="header-container" >
		
		<div class="col-md-2" style="text-align: left">
			<button  @click="mostarVentana=true" style="padding: 25px"><img src="/SERVIPARK/framework/Menu/assets/menu.svg"></button>
			
		</div>
		<div class="col-md-10" style="text-align: right">
			 <a href= "/SERVIPARK/controlador/menuControlador.php?id=<?php echo $id?>" style="text-decoration: none; color: white"><span  style="padding: 10px; padding-right: 10px;padding-left: 100px; font-size: 18px">
     		 <b>SERVIPARK</b> <img src="/SERVIPARK/img/carrera.png" height="70px"style="padding: 10px; padding-top:0px " >
   			 </span></a>
		</div>
   
  </div>


            <div class="contenedor" v-if="mostarVentana">
				<button  @click="mostarVentana=false" style="text-align: center; padding: 25px;"><img src="/SERVIPARK/framework/Menu/assets/close.svg"></button>
				<br>
				<br>
				<br>
				
					
					<div class="menu_nav" style="padding-left: 80px;padding-top: 20px; width: 300px; font-size: 28px; color: white;" v-on:mouseover="conEnfoqueMouse" v-on:mouseleave="sinEnfoqueMouse">
						<a href="/SERVIPARK/controlador/menuControlador.php?id=<?php echo $id?>"  class="bi bi-house" v-bind:style="{ color: color1 }" style="color: #FFFFFF; text-decoration: none; position: relative;">
							 INICIO
						</a>
						<div class="row" v-if="activo==1" style="z-index: 100; padding-right: 200px; font-size: 20px; width: 500px; transition-property: 10;">
							<span style="text-align: left; padding-bottom: 10px">Encuentre aquí el menú principal y otras funcionalidades.</span>
						</div>
					</div>
				
				<?php
						$bd = new BD();
						$bd->imprimir_encabezado("SELECT * FROM menus WHERE menus.id_nivel=$Nivel ",$id);					
					?>

				
            </div>



		</div>
</body>
		
<script>
	new Vue({
		el: "#codigoVue2",
		data:{
			
			mostarVentana:false,
			color1:"white",
			color2:"white",
			color3:"white",
			color4:"white",
			color5:"white",
			color6:"white",
			color7:"white",
			color8:"white",
			activo:0,
			activo1:0,
			activo2:0,
			activo3:0,
			activo4:0,
			activo5:0,
			activo6:0,
			activo7:0
		},
		methods:{
			 
				
			
			conEnfoqueMouse: function(){
				this.activo= 1,
				this.color1 ="white" 
				this.color2 ="darkslategray" 
				this.color3 ="darkslategray" 
				this.color4 ="darkslategray" 
				this.color5 ="darkslategray"
				this.color6 ="darkslategray" 
				this.color7 ="darkslategray" 
			},
				sinEnfoqueMouse: function(){
				this.activo= 2,
				this.color1 ="white" 
				this.color2 ="white" 
				this.color3 ="white" 
				this.color4 ="white" 
				this.color5 ="white" 
				this.color6 ="white" 
				this.color7 ="white" 
			},
			conEnfoqueMouse1: function(){
				this.activo1= 1,
				this.color1 ="darkslategray" 
				this.color2 ="white" 
				this.color3 ="darkslategray" 
				this.color4 ="darkslategray" 
				this.color5 ="darkslategray"
				this.color6 ="darkslategray" 
				this.color7 ="darkslategray" 
			},
				sinEnfoqueMouse1: function(){
				this.activo1= 2,
				this.color1 ="white" 
				this.color2 ="white" 
				this.color3 ="white" 
				this.color4 ="white" 
				this.color5 ="white" 
				this.color6 ="white" 
				this.color7 ="white" 
			},
			conEnfoqueMouse2: function(){
				this.activo2= 1,
				this.color1 ="darkslategray" 
				this.color2 ="darkslategray" 
				this.color3 ="white" 
				this.color4 ="darkslategray" 
				this.color5 ="darkslategray"
				this.color6 ="darkslategray" 
				this.color7 ="darkslategray" 
			},
			sinEnfoqueMouse2: function(){
				this.activo2= 2,
				this.color1 ="white" 
				this.color2 ="white" 
				this.color3 ="white" 
				this.color4 ="white" 
				this.color5 ="white" 
				this.color6 ="white" 
				this.color7 ="white" 
			},
			conEnfoqueMouse3: function(){
				this.activo3= 1,
				this.color1 ="darkslategray" 
				this.color2 ="darkslategray" 
				this.color3 ="darkslategray" 
				this.color4 ="white" 
				this.color5 ="darkslategray"
				this.color6 ="darkslategray" 
				this.color7 ="darkslategray" 
			},
				sinEnfoqueMouse3: function(){
				this.activo3= 2,
				this.color1 ="white" 
				this.color2 ="white" 
				this.color3 ="white" 
				this.color4 ="white" 
				this.color5 ="white"
				this.color6 ="white" 
				this.color7 ="white" 
			},
			conEnfoqueMouse4: function(){
				this.activo4= 1,
				this.color1 ="darkslategray" 
				this.color2 ="darkslategray" 
				this.color3 ="darkslategray" 
				this.color4 ="darkslategray" 
				this.color5 ="white"
				this.color6 ="darkslategray" 
				this.color7 ="darkslategray" 
			},
				sinEnfoqueMouse4: function(){
				this.activo4= 2,
				this.color1 ="white" 
				this.color2 ="white" 
				this.color3 ="white" 
				this.color4 ="white" 
				this.color5 ="white" 
				this.color6 ="white" 
				this.color7 ="white" 
			},
			conEnfoqueMouse5: function(){
				this.activo5= 1,
				this.color1 ="darkslategray" 
				this.color2 ="darkslategray" 
				this.color3 ="darkslategray" 
				this.color4 ="darkslategray" 
				this.color5 ="darkslategray"
				this.color6 ="white" 
				this.color7 ="darkslategray" 
			},
				sinEnfoqueMouse5: function(){
				this.activo5= 2,
				this.color1 ="white" 
				this.color2 ="white" 
				this.color3 ="white" 
				this.color4 ="white" 
				this.color5 ="white"
				this.color6 ="white" 
				this.color7 ="white" 
			},
				conEnfoqueMouse6: function(){
				this.activo6= 1,
				this.color1 ="darkslategray" 
				this.color2 ="darkslategray" 
				this.color3 ="darkslategray" 
				this.color4 ="darkslategray" 
				this.color5 ="darkslategray"
				this.color6 ="darkslategray" 
				this.color7 ="white" 
			},
				sinEnfoqueMouse6: function(){
				this.activo6= 2,
				this.color1 ="white" 
				this.color2 ="white" 
				this.color3 ="white" 
				this.color4 ="white" 
				this.color5 ="white" 
				this.color6 ="white" 
				this.color7 ="white" 
			},
				conEnfoqueMouse7: function(){
				this.activo7= 1,
				this.color1 ="darkslategray" 
				this.color2 ="darkslategray" 
				this.color3 ="darkslategray" 
				this.color4 ="darkslategray" 
				this.color5 ="darkslategray"
			},
				sinEnfoqueMouse7: function(){
				this.activo7= 2,
				this.color1 ="white" 
				this.color2 ="white" 
				this.color3 ="white" 
				this.color4 ="white" 
				this.color5 ="white" 
				this.color6 ="white" 
				this.color7 ="white" 
			}
		}
	})
</script>
</html>