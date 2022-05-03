<br>
<br>

<h1>
	<span>Ingresá a tu cuenta</span>
</h1>
<br>


<form method="post" action="">

	<div>
		<label>Usuario</label>
		<input class="field_class" type="text" placeholder="Usuario aquí..." name="usuario_ingreso" required>	
	</div>

	<div>
		<label>Contraseña</label>
		<input class="field_class" type="password" placeholder="Contraseña aquí..." name="clave_ingreso" required>
		<input class="submit_class"  type="submit" value="Ingresar">
	</div>




</form>
<?php
$ingreso = new UsuariosControlador();
$ingreso->Ingresar();


?>