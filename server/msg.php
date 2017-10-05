<?php
if (!isset($_GET['error'])) 
{
	# code...
}elseif($_GET['error'] == '771')
{
	//echo 'Contraseña Incorrecta';
	?>
	<div class="alert alert-danger">Contraseña Incorrecta</div>
<?php
}elseif($_GET['error'] == '777')
{//echo  'Usiario Incorrecto';
?>
	<div class="alert alert-danger">Usiario Incorrecto</div>
<?php
}
?>