<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Agregar Usuario</title>
</head>
<body>
	<div>
		<ul>
			<li><a href="index.php">Listado</a></li>
			<li><a href="index.php?c=user&a=agregar">Agregar</a></li>
		</ul>
	</div>
	<form action="" id="form-agregar">
		<table>
			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="txtNombre" id="txtNombre"></td>
			</tr>
			<tr>
				<td>Apellido Paterno: </td>
				<td><input type="text" id="txtApePaterno" name="txtApePaterno"></td>
			</tr>
			<tr>
				<td>Apellido Materno: </td>
				<td><input type="text" name="txtApeMaterno" id="txtApeMaterno"></td>
			</tr>
			<tr>
				<td>Fecha Nacimiento: </td>
				<td><input type="date" name="f_nacimiento" id="f_nacimiento"></td>
			</tr>
			<tr>
				<td>DNI: </td>
				<td><input type="text" id="txtDni" name="txtDni"></td>
			</tr>
			<tr>
				<td>Edad: </td>
				<td><input type="text" id="txtEdad" name="txtEdad"></td>
			</tr>
			<tr>
				<td>Cargo</td>
				<td>
					<select name="cmbCargo" id="cmbCargo">
						<option value="0">Seleccione Cargo</option>
					<?php
					foreach($cargos as $cargo){
					?>
						<option value="<?php echo $cargo->id;?>"><?php echo $cargo->nombre_cargo;?></option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Estado: </td>
				<td>
					<select name="cmbEstado" id="cmbEstado">
					<?php
					foreach($estados as $estado){
						if($estado->nombre_estado == "ACTIVO"){
					?>
					<option value="<?php echo $estado->id;?>" selected><?php echo $estado->nombre_estado;?></option>
					<?php
						}
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="btnAgregar" id="btnAgregar" value="Agregar"></td>
				<td><input type="reset" value="Limpiar" id="btnLimpiar"></td>
			</tr>
		</table>
	</form>
	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/main.js"></script>
</body>
</html>