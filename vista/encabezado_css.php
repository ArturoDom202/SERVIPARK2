<!doctype html>
<html>
<head>
	
    <link href="/SERVIPARK/framework/Menu/styles.css" rel="stylesheet" />
	<?php 
		$id=$_GET["id"];
		?>
		<meta charset="utf-8">
	
	<div class="header-container">
		
			 <button class="navbar-burger" onclick="toggleMenu()"></button>
		<div class="col-sm-12" style="text-align: right">
			 <h2 class="logo" style="padding: 10px; padding-right: 5px;padding-left: 100px">
      SERVIPARK <img src="../img/carrera.png" height="80px"style="padding: 10px; padding-top:0px " >
    </h2>
		</div>
   
   
  </div>
	
    <div class="menu" >
      <nav >
        <a href="/SERVIPARK/controlador/menuControlador.php?id=<?php echo $id ?>" style="animation-delay: 0.1s"><span class="bi-house"> </span> Inicio</a2>
        <a href="/SERVIPARK/controlador/equiposControlador.php?id=<?php echo $id ?>" style="animation-delay: 0.2s"><span class="bi-pc-display-horizontal"> </span> Equipos</a2>
        <a href="/SERVIPARK/controlador/usuariosControlador.php?id=<?php echo $id ?>" style="animation-delay: 0.3s"><span class="bi-people-fill"> </span> Usuarios</a2>
        <a href="/SERVIPARK/" style="animation-delay: 0.5s"><span class="bi-x-circle"> </span> Cerrar Sesion</a>
      </nav>
    </div>
    <script type="text/javascript">
      const toggleMenu = () => {
        document.body.classList.toggle("open");
      };
    </script>
</head>
</html>
