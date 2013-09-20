<html>
	<head>
		<script>
		<!-- FUNCAO RESPONSAVEL PELA MPRESSAO DA PAGINA -->
		function printpage() 
		  {
			window.print()
		  }
		  
		</script>
	</head>
</html>

<?php

	include_once "../persist/SqlManager.class.php";
	include_once "../l_application/index.php";
	
	$conn = new SqlManager("connect");
	
	$titulo = utf8_encode($_POST["titulo"]);
	$tema = utf8_encode($_POST["tema"]);
	$idioma = utf8_encode($_POST["idioma"]);
	$descricao = utf8_encode($_POST["descricao"]);
	$nomefoto = utf8_encode($_POST["nomefoto"]);
	
	$query1 = "select * 
	from foto, caso
	where foto.idfoto = caso.idfoto";
	
	$result1 = $conn->ExecuteRead($query1);
	
	$query2 = "select codigocaso 
	from caso";
	
	$result2 = $conn->ExecuteRead($query1);
	
	$query232 = "select * from caso";
	$result232= $conn->ExecuteRead($query232);
	//$db_connection = pg_connect("host=localhost dbname=sistema user=postgres password=061089");
	
	//$result = pg_query($db_connection, "SELECT codigocaso FROM caso");

	 foreach ( $result2 as $row )
	{
		$valor = utf8_decode($row["codigocaso"]);
		
		$return .= "<tr>";
		$return .= "<td colspan='1'>";
		$return .= "<label>" . $valor . "</label>";
		$return .= "</td>";
		$return .= "</tr>";
	}
	
	//echo "<table id='searchTableTelaToda' class='searchTableTelaToda'>";
	
	echo "<form action='telaprincipal.php' name='novocaso' method='post'>";
	echo "<table align='center' cellpadding='0' cellspacing='5px'>";

    //inicio: aqui funciona , eu chamo do banco de dados informacoes !!!	<--------
	/*echo "<tr>";
	echo "<td align='right'><label>Titulo : </label></td>";
	echo "<td align='left'><select name='titulo'>";
	foreach ( $result232 as $row )
	{
		$valor = utf8_decode($row["titulo"]);
		echo "<option value={$valor}>" . $valor . "</option>";
	}
	echo "</select></td>";
	echo "</tr>";*/
	//fim---------------------------
	
		echo "<td align='right'><label>";
		echo "Titulo : " . $_POST["titulo"];
		echo"</label></td>";
	
	echo "</tr>";
	
	echo "<td align='right'><label>Tema : " . $_POST["tema"];
	echo "</label></td>";
	
	echo "<tr>";
	echo "<td align='right'><label>Descrição : " . $_POST["descricao"];;
	echo "</label></td>";
	echo "</tr>";
	
	
	echo "<td align='right'><label>Idioma : ". $_POST["idioma"];
	echo "</label></td>";
	$idioma;
	
	//echo "<td align='left'><textarea name='idioma' rows='1'cols='20'></textarea></td>";
	//echo "<td align='left'><input type='text' name='idioma'/></td>";
	
	echo "<tr>";
	echo "<td align='right'><label>Foto : " . $_POST["nomefoto"];;
	echo "</label></td>";
	//echo "<td align='left'><input type='text' name='idioma'/></td>";
	echo "</tr>";
	
	
	// ************************************************************************************
	echo "<tr>";
	
	echo "<td align='right'><label>Nova Tag : " . $_POST["nometag"];
	echo "</label></td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "</br>";
	echo "</tr>";
	
		
	echo "<tr>";
	echo "<td colspan='2' align='center' onclick='myFunction()'><input type='submit' value='Voltar'/></td>";
	echo "<td colspan='2' align='center' onclick='printpage()'><input type='submit' value='Imprimir'/></td>";
	echo "</tr>";
	
	echo "<tr><td id='demo'></td></tr>";
	echo "</table>";

	echo "</form>";
	//echo "</table>";	

	if ( isset($_GET["ret1"]) )
	{
		echo $_GET["ret1"];
	}
	
	$conn->closeConnection();
	
	/*
	if ( $numLinhas == 1 )
		header('Location: index.php?flag=1&page=novocasoFormulario&ret1='. $return);
	else
		header('Location: index.php?flag=0&page=novocasoFormulario&ret1='. $return);
*/?>