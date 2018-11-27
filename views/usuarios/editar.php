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
			<li><a href="index.php?c=user&a=editar&id=<?php echo $_GET['id'];?>">Editar a <b><?php echo $usuario->nombre;?></b></a></li>
		</ul>
	</div>
	<form action="" id="form-editar">
		<input type="hidden" name="id" value="<?php echo $usuario->id;?>">
		<table>
			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="txtNombre" id="txtNombre" value="<?php echo $usuario->nombre;?>"></td>
			</tr>
			<tr>
				<td>Apellido Paterno: </td>
				<td><input type="text" id="txtApePaterno" name="txtApePaterno" value="<?php echo $usuario->apellido_paterno;?>"></td>
			</tr>
			<tr>
				<td>Apellido Materno: </td>
				<td><input type="text" name="txtApeMaterno" id="txtApeMaterno" value="<?php echo $usuario->apellido_materno;?>"></td>
			</tr>
			<tr>
				<td>Fecha Nacimiento: </td>
				<td><input type="date" name="f_nacimiento" id="f_nacimiento" value="<?php echo $usuario->fecha_nacimiento;?>"></td>
			</tr>
			<tr>
				<td>DNI: </td>
				<td><input type="text" id="txtDni" name="txtDni" value="<?php echo $usuario->dni;?>"></td>
			</tr>
			<tr>
				<td>Edad: </td>
				<td><input type="text" id="txtEdad" name="txtEdad" value="<?php echo $usuario->edad;?>"></td>
			</tr>
			<tr>
				<td>Cargo</td>
				<td>
					<select name="cmbCargo" id="cmbCargo">
						<option value="0">Seleccione Cargo</option>
					<?php
					foreach($cargos as $cargo){
						if($usuario->id_cargo == $cargo->id){
					?>
						<option value="<?php echo $cargo->id;?>" selected><?php echo $cargo->nombre_cargo;?></option>
					<?php
						}else{
					?>
						<option value="<?php echo $cargo->id;?>"><?php echo $cargo->nombre_cargo;?></option>
					<?php
						}
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Estado: </td>
				<td>
					<select name="cmbEstado" id="cmbEstado">
						<option value="0">Seleccione Estado</option>
					<?php
					foreach($estados as $estado){
						if($usuario->id_estado == $estado->id){
					?>
						<option value="<?php echo $estado->id;?>" selected><?php echo $estado->nombre_estado;?></option>
					<?php
						}else{
					?>
						<option value="<?php echo $estado->id;?>"><?php echo $estado->nombre_estado;?></option>
					<?php
						}
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="btnEditar" id="btnEditar" value="Editar"></td>
				<td><input type="reset" value="Limpiar" id="btnLimpiar"></td>
			</tr>
		</table>
	</form>
	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/main.js"></script>
</body>
</html>