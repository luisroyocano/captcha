<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
	<div class="container">
		<?php

			generateCapchaForm();

			function generateCapchaForm(){
				echo <<<FORMULARIO
				<form action="index.php" method="get">
					<h4>Introduce el texto del captcha</h4>
					<img src='captcha.php' border='0' /></br>
					<label>Captcha</label>
					<input type="text" name="capcha" value="" placeholder="texto del captcha" /><br>
					<input class = "boton" type="submit" value="Enviar" />
				</form>
FORMULARIO;
			}

		?>
	</div>
</body>
</html>