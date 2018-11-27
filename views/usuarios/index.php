<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listado de usuarios</title>
</head>
<body>
	<div>
		<ul>
			<li><a href="index.php">Listado</a></li>
			<li><a href="index.php?c=user&a=agregar">Agregar</a></li>
		</ul>
	</div>
	<?php
	if(sizeof($usuarios) > 0){
	?>
	<table border="1">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellidos Materno</th>
				<th>Fecha Nacimiento</th>
				<th>Fecha Registro</th>
				<th>Fecha Actualización</th>
				<th>DNI</th>
				<th>Edad</th>
				<th>Cargo</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($usuarios as $usuario) {
			?>
			<tr>
				<td><?php echo $usuario->nombre;?></td>
				<td><?php echo $usuario->apellido_paterno;?></td>
				<td><?php echo $usuario->apellido_materno;?></td>
				<td><?php echo $usuario->fecha_nacimiento;?></td>
				<td><?php echo $usuario->fecha_registro;?></td>
				<td><?php echo $usuario->fecha_actualizacion;?></td>
				<td><?php echo $usuario->dni;?></td>
				<td><?php echo $usuario->edad;?></td>
				<td><?php echo $usuario->nombre_cargo;?></td>
				<td><?php echo $usuario->nombre_estado;?></td>
				<td>
					<a href="index.php?c=user&a=editar&id=<?php echo $usuario->id;?>">Editar</a>
					<a href="index.php?c=user&a=eliminar&id=<?php echo $usuario->id;?>" onclick="eliminar(<?php echo $usuario->id;?>)">Eliminar</a>
				</td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<?php
	}
	?>
	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/main.js"></script>
</body>
</html>