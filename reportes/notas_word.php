<?php
	//header('Content-Type:application/msword');
	//header('Content-Type:text/plain');
	header('Content-Type:apllication/msword');
	header('Content-Disposition: attachment; filename="reporte_notas.doc"');

	mysql_connect('localhost','root','') or die ("No se puede conectar a la base".mysql_error());
	mysql_select_db('notas_itr') or die ("Base de datos no existe".mysql_error());
	$resultado=mysql_query('select * from vw_alumnos_notas');

	echo '
	<table width="400" border="1" bordercolor="#000000">
		<tr>
			<td width="175" bgcolor="#CCFF35">Nota</td>
			<td width="215" bgcolor="#CCFF35">Grado</td>
			<td width="215" bgcolor="#CCFF35">Secciones</td>
			<td width="215" bgcolor="#CCFF35">Codigo</td>
			<td width="215" bgcolor="#CCFF35">Materia</td>
			<td width="215" bgcolor="#CCFF35">Actividad</td>
			<td width="215" bgcolor="#CCFF35">Porcentaje</td>
			<td width="215" bgcolor="#CCFF35">Tipo Actividad</td>
			<td width="215" bgcolor="#CCFF35">Fecha Entrega</td>
			<td width="215" bgcolor="#CCFF35">Codigo Profesor</td>
			<td width="215" bgcolor="#CCFF35">Nombre Profesor</td>
			<td width="215" bgcolor="#CCFF35">Apellido Profesor</td>
			<td width="215" bgcolor="#CCFF35">Nombre Alumno</td>
			<td width="215" bgcolor="#CCFF35">Apellido Alumno</td>
			<td width="215" bgcolor="#CCFF35">NIE</td>
			<td width="215" bgcolor="#CCFF35">Grado</td>
			<td width="215" bgcolor="#CCFF35">Nombre Actividad</td>
		</tr>
	';
	while ($f=mysql_fetch_array($resultado))
	{
		echo '
			<tr>
				<td>'.$f['NOTA'].'</td>
				<td>'.$f['GRADO'].'</td>
				<td>'.$f['STR_SECCIONES'].'</td>
				<td>'.$f['STR_CODIGO'].'</td>
				<td>'.$f['NOMBRE_MATERIA'].'</td>
				<td>'.$f['NOMBRE_ACTIVIDAD'].'</td>
				<td>'.$f['PORCENTAJE'].'</td>
				<td>'.$f['IDTIPO_ACTIVIDAD'].'</td>
				<td>'.$f['FECHA_ENTREGA'].'</td>
				<td>'.$f['STR_CODIGO_PROFESOR'].'</td>
				<td>'.$f['STR_NOMBRE_PROFESOR'].'</td>
				<td>'.$f['STR_APELLIDO_PROFESOR'].'</td>
				<td>'.$f['STRNIE'].'</td>
				<td>'.$f['STR_NOMBRE_ACTIVIDAD'].'</td>
			</tr>
		';
	}
	echo '</table>';	
?>