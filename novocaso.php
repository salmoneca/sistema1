<?php

	include_once "../persist/SqlManager.class.php";
	

	$codigocaso = rand(0,9999999999);
	
	$idfoto = rand(0,9999999999);
	$nomefoto = utf8_encode($_POST["nomefoto"]);
	
	$titulo = utf8_encode($_POST["titulo"]);
	$tema = utf8_encode($_POST["tema"]);
	$descricao = utf8_encode($_POST["descricao"]);
	$idioma = utf8_encode($_POST["idioma"]);
	
	$idtag = 1;  // aqui aqui aqui aqui aqui aqui ------------------------------------- tenho que mudar isso !!!
	$novatag = utf8_encode($_POST["novatag"]);
	$idgrupotag = 5; // Minhas Tags.
	
	$conn = new SqlManager("connect");
	
	
	$query1 = "INSERT INTO tag VALUES ('" . $idtag. "', '" . $novatag . "', '" . $idgrupotag . "')";
	$numLinhas1 = $conn->executeCommand($query1);
	
	
	$query0 = "INSERT INTO Foto VALUES ('" . $idfoto. "', '" . $nomefoto . "')";
	$numLinhas0 = $conn->executeCommand($query0);
	
	$query = "INSERT INTO Caso VALUES ('" . $codigocaso. "', '" . $titulo . "', '" . $tema . "', 
	'" . $descricao . "', '" . $idfoto. "', '" . $idioma . "', null, '" . $idtag. "')";
	
	// inicio mensagem de cadastro com sucesso 
	if ($query) {
		echo "<p align=center> Cadastro realizado com sucesso! </p>";
	}
	else {
		echo "<p align=center> Cadastro não foi possível ser realizado! </p>";
	}
	// fim mensagem de cadastro com sucesso 
	
	
	$numLinhas = $conn->executeCommand($query);

	$query2 = "SELECT *
	FROM Pessoa
	Where codigocaso='$codigocaso'";
	
	$result2 = $conn->ExecuteRead($query2);
	
	$return = "<table align='left' border=1  cellpadding='0' cellspacing='0'>";
	
		
	/*
	$return .= "<tr><td><label>codigocaso</label></td>
	<td><label>titulo</label></td><td><label>tema</label></td><td><label>descricao</label></td>
	<td><label>idfoto</label></td><td><label>idioma</label></td><td><label>idcomentario</label>
	</td></tr>";


	foreach ( $result2 as $row )
	{
		
		$valor2 = utf8_decode($row["titulo"]);
		$valor3 = utf8_decode($row["tema"]);
		$valor4 = utf8_decode($row["descricao"]);
		$valor5 = utf8_decode($row["idioma"]);
		

		$return .= "<td colspan='1'>";
		$return .= "<label>" . $valor2 . "</label>";
		$return .= "</td>";

		$return .= "<td colspan='1'>";
		$return .= "<label>" . $valor3 . "</label>";
		$return .= "</td>";
		
		$return .= "<td colspan='1'>";
		$return .= "<label>" . $valor4 . "</label>";
		$return .= "</td>";

		$return .= "<td colspan='1'>";
		$return .= "<label>" . $valor5 . "</label>";
		$return .= "</td>";

		$return .= "</tr>";
		
	}
	echo "'$return'";
	*/
	$conn->closeConnection();
	
	if ( $numLinhas == 1 )
		header('Location: index.php?flag=1&page=novocaso&ret1='. $return);
	else
		header('Location: index.php?flag=0&page=novocaso&ret1='. $return);
	
?>
