<?php
	
	include_once "../persist/SqlManager.class.php";
	$conn = new SqlManager("connect");
	$titulo = utf8_encode($_POST["titulo"]);
	$tema = utf8_encode($_POST["tema"]);
	$idioma = utf8_encode($_POST["idioma"]);

	$query = "SELECT *
	FROM Caso 
	WHERE titulo like '%".$titulo."%' and tema like '%".$tema."%' and idioma ='$idioma'
	ORDER BY Caso.titulo";

	$result = $conn->ExecuteRead($query);
	
	$return = "<table align='left' border=1  cellpadding='0' cellspacing='0'>";
	
	$return .= "<tr><td><label>Titulo</label></td>
	<td><label>Tema</label></td><td><label>Idioma</label></td></tr>";


	foreach ( $result as $row )
	{
		$valor = utf8_decode($row["titulo"]);
		$valor2 = utf8_decode($row["tema"]);
		
		$valor7= utf8_decode($row["idioma"]);
		
		$return .= "<tr>";
		$return .= "<td colspan='1'>";
		
		$return .= "<a href='novocasoFormulario.Form.php'>" . $valor . "</a>";
		// $return .= "<a href='index.php?flag=1&page=novocasoFormulario&ret1='.$codigocaso>" . $valor . "</a>";
		// http://localhost:8081/phppgadmin/a_sistema/public_html/aulaphp/l_application/index.php?flag=1&page=novocaso&ret1=1202394031
		
		$return .= "</td>";

		$return .= "<td colspan='1'>";
		$return .= "<label>" . $valor2 . "</label>";
		$return .= "</td>";
		
		$return .= "<td colspan='1'>";
		$return .= "<label>" . $valor7 . "</label>";
		$return .= "</td>";


		$return .= "</tr>";

	}
	
	$conn->closeConnection();
	
	header('Location: index.php?page=telaprincipal&ret1=' . $return);

?>


