<!DOCTYPE html>

<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> INICIAR SESION</title>
  <link rel="stylesheet" href="/SERVIPARK/framework/style.css"> 
  <link href="/SERVIPARK\fuentes\bootstrap-icons-1.10.5\font/bootstrap-icons.css" rel="stylesheet" type="text/css">
	
</head>
<?php
$color="claro";
if(isset($_GET["c"])){
	$color=$_GET["c"];
}	
	
?>
<body  background=<?php echo'/SERVIPARK/img/'.$color.'.svg';?>>
	  <form method="get">
        <input type="hidden" name="c" value="<?php echo isset($_GET['c']) && $_GET['c'] === 'obscuro' ? 'claro' : 'obscuro'; ?>">
        <button  <?php echo isset($_GET['c']) && $_GET['c'] === 'obscuro' ? 'class="bi bi-moon-stars-fill" style="background: none;border: none; padding: 0; margin: 0; font-size: 30px;color: #000000" '  : 'class="bi bi-sun-fill" style="background: none;border: none; padding: 0; margin: 0; font-size: 30px;color: #FFFFFF"'; ?> type="submit"></button>
    </form>
	
	<form method="post">
<!-- partial:index.partial.html -->
<div class="page">
  <div class="container">
	  
	
	  
    <div class="left" style="text-align: center">
      <div class="login" style="font-size: 28px">BIENVENIDO A SERVIPARK</div>
      <div class="eula" style="font-size: 16px">Ingrese sus datos para acceder al sistema.</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form" >
        <label for="email">TELEFONO / CORREO</label>
        <input type="email tel" class="form-control" placeholder="Ingrese su numero o email" name="txt_email" maxlength="50" pattern="[A-Za-z0-9@_.-]{13,35}" id="email" required>
        <label for="password"  >CONTRASEÑA</label>
        <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="txt_password" maxlength="4"  id="password" required>
        <input type="submit"  id="submit" name="enviar" value="Ingresar">
		  <?php
	if(isset($_POST["enviar"])){
		
		$validacion = new validacion_Model(); //Creamos una instacia de validar
		$validacion->validar();		

	}

?>
      </div>
    </div>
  </div>
</div>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js'></script><script  src="/SERVIPARK/framework/script.js"></script>
	</form>
</body>
</div>
</html>

