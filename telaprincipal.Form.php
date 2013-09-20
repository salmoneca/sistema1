<html>
	<head>
		<script src="index_util.js"></script>
	</head>
</html>
<?php
	include_once "../persist/SqlManager.class.php";
	
	
	$conn = new SqlManager("connect");

	$query = "SELECT DISTINCT idioma FROM caso ORDER BY caso.idioma";
	
	$result = $conn->ExecuteRead($query);
	//aqui
	$query2 = "SELECT nometag FROM tag where idgrupotag=1 ORDER BY TAG.nometag";
	$result2 = $conn->ExecuteRead($query2);
	
	$query3 = "SELECT nometag FROM tag where idgrupotag=2 ORDER BY TAG.nometag";
	$result3 = $conn->ExecuteRead($query3);
	
	$query4 = "SELECT nometag FROM tag where idgrupotag=3 ORDER BY TAG.nometag";
	$result4 = $conn->ExecuteRead($query4);
	
	$query5 = "SELECT nometag FROM tag where idgrupotag=4 ORDER BY TAG.nometag";
	$result5 = $conn->ExecuteRead($query5);
	
	$query6 = "SELECT nometag FROM tag where idgrupotag=5 ORDER BY TAG.nometag";
	$result6 = $conn->ExecuteRead($query6);
	
	echo "<table id='searchTableTelaToda' class='searchTableTelaToda'>";
	echo "<tr><td id='tagsTd' class='tagsTd'>";
	// fim
	
	echo "<form action='telaprincipal.php' name='telaprincipal' method='post'>";
	echo "<table align='center' cellpadding='0' cellspacing='5px'>";
	//echo "<tr>";
	
	echo "<tr>";
	echo "<td align='right'><label>Titulo:</label></td>";
	echo "<td align='left'><input type='text' name='titulo'/></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td align='right'><label>Tema:</label></td>";
	echo "<td align='left'><input type='text' name='tema'/></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td align='right'><label>Idioma</label></td>";
	echo "<td align='left'><select name='idioma'>";
	foreach ( $result as $row )
	{
		$valor = utf8_decode($row["idioma"]);
		
	/*echo "<option value='Portugues'>Português</option>";
	echo "<option value='Ingles'>Inglês</option>";
	echo "<option value='Espanhol'>Espanhol</option>";
	echo "</td></select>";
	*/	echo "<option value={$valor}>" . $valor . "</option>";
	}
	echo "</select></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td colspan='2' align='center'><input type='submit' value='Buscar'/></td>";
	
	echo "</tr>";
	echo "</table>";
	
	
	// aqui 
	echo "<table id='actionTypeTable' class='actionTypeTable'>";
	echo "<tr><td class='indexTags'>";
	echo "<div class='indexTitle'>";
	echo "Tipos de Ação : ";
	echo "<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	
	echo "<div id='actionTypeTagDiv'>";
	
	echo "<tr>";
	//echo "<td align='right'><label>Tag</label></td>";
	echo "<td align='left'>"; //<select name='nometag'>";
	
	//echo "<form>";
	
	foreach ( $result2 as $row2 ) // ********************** AQUI DIFERENTE DOS OUTROS !!!! ********************
	{
		$valor2 = utf8_decode($row2["nometag"]);
		
			echo "<div id =\"divTag".$row2["idtag"]."\">
			<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row2["idtag"] . "\" value=\"" . $tag["idtag"] . "\" 
			onClick=\"toogle_checkbox('tagCB{$row2["idtag"]}', {$row2["idtag"]})\" >" . $valor2 . " 
			<span class = \"caseCountSpan\" id=\"spanTag" . $row2["idtag"] . "\">
			</span></div>";
	
		//$valor2 = utf8_decode($row2["nometag"]);
		
		//echo "<input type='checkbox' name={$valor2} id={$valor2} value={$valor2}>" . $valor2;
		//echo "</br>";
	}
	//echo "</form>
	
	//echo "</tr>";
	
	echo "</div>";
	echo "<div class='deselectDiv'>";
	echo "<a href='javascript:void(0)' onClick='deselect_checkboxes('actionTag');'>";
	echo "Desselecionar";
	echo "</a></div>";
	echo "</td>"; // *************************************************************************************************ESSE
	echo "</td></tr>";
	echo "</tr>";
	echo "</table>";
	echo "</br>";
	// fim 
	
	// quadro 2------------------------------------------
	
	// aqui 
	echo "<table id='actionTypeTable' class='actionTypeTable'>";
	echo "<tr><td class='indexTags'>";
	echo "<div class='indexTitle'>";
	echo "Artefatos : ";
	echo "<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	
	echo "<div id='actionTypeTagDiv'>";
	
	echo "<tr>";
	//echo "<td align='right'><label>Tag</label></td>";
	echo "<td align='left'>"; //<select name='nometag'>";
	
	//echo "<form>"; //<<-------------------------------------------------------------- AQUI
	//echo "<input type='submit' name='enviou' value='Enviar' />";
	
	foreach ( $result3 as $row3 )
	{
	
	$valor3 = utf8_decode($row3["nometag"]);
		
			echo "<div id =\"divTag".$row3["idtag"]."\">
			<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row3["idtag"] . "\" value=\"" . $tag["idtag"] . "\" 
			onClick=\"toogle_checkbox('tagCB{$row3["idtag"]}', {$row3["idtag"]})\" >" . $valor3 . " 
			<span class = \"caseCountSpan\" id=\"spanTag" . $row3["idtag"] . "\">
			</span></div>";
	
	//	$valor3 = utf8_decode($row3["nometag"]); //<<-------------------------------------------------------------- AQUI
	//	echo "<input type='checkbox' name={$valor3} id={$valor3} value={$valor3}>" . $valor3; //<<----------------- AQUI
	//	echo "</br>"; //<<-------------------------------------------------------------- AQUI
	}
	//echo "</form></td>"; //<<-------------------------------------------------------------- AQUI
	//echo "</tr>"; //<<-------------------------------------------------------------- AQUI
	
	echo "</div>";
	echo "<div class='deselectDiv'>";
	echo "<a href='javascript:void(0)'onClick='deselect_checkboxes('actionTag');'>";
	echo "Desselecionar";
	echo "</a></div>";
	echo "</td>";
	echo "</td></tr>";
	echo "</tr>";
	echo "</table>";
	echo "</br>";

	
	// fim
	
	// quadro 3---------------------------------------------------------------
	
	// aqui 
	echo "<table id='actionTypeTable' class='actionTypeTable'>";
	echo "<tr><td class='indexTags'>";
	echo "<div class='indexTitle'>";
	echo "Widgets : ";
	
	echo "<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	
	echo "<div id='actionTypeTagDiv'>";
	
	echo "<tr>";
	//echo "<td align='right'><label>Tag</label></td>";
	echo "<td align='left'>"; //<select name='nometag'>";
	
	// echo "<form>"; //<<-------------------------------------------------------------- AQUI
	//echo "<td align='left'><form><input type='checkbox' id='check1' name='nometag' value='nometag'>teste";
	
	foreach ( $result4 as $row4 )
	{
		$valor4 = utf8_decode($row4["nometag"]);
			
				echo "<div id =\"divTag".$row4["idtag"]."\">
				<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row4["idtag"] . "\" value=\"" . $tag["idtag"] . "\" 
				onClick=\"toogle_checkbox('tagCB{$row4["idtag"]}', {$row4["idtag"]})\" >" . $valor4 . " 
				<span class = \"caseCountSpan\" id=\"spanTag" . $row4["idtag"] . "\">
				</span></div>";
			
		//$valor4 = utf8_decode($row4["nometag"]); //<<-------------------------------------------------------------- AQUI
		//echo "<input type='checkbox' name={$valor4} id={$valor4} value={$valor4}>" . $valor4; //<<----------------- AQUI
		//echo "</br>";//<<-------------------------------------------------------------- AQUI
	}
	//echo "</form></td>"; //<<---------------------------------------------------------- AQUI
	//	echo "</select></td>";
	//echo "</tr>"; //<<----------------------------------------------------------------- AQUI
	
	echo "</div>";
	echo "<div class='deselectDiv'>";
	echo "<a href='javascript:void(0)' onClick='deselect_checkboxes('actionTag');'>";
	echo "Desselecionar";
	echo "</a></div>";
	echo "</td>"; //<<------------------------------------------------------------------ AQUI
	echo "</td></tr>";
	echo "</tr>";
	echo "</table>";
	echo "</br>";

	
	// fim
	
	// quadro 4---------------------------------------------------------------
	
	// aqui 
	echo "<table id='actionTypeTable' class='actionTypeTable'>";
	echo "<tr><td align='left' class='indexTags'>";
	echo "<div class='indexTitle'>";
	echo "Padrões : ";
	echo "<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	
	echo "<div id='actionTypeTagDiv'>";
	
	echo "<tr>";
	//echo "<td align='right'><label>Tag</label></td>";
	echo "<td align='left'>"; //<select name='nometag'>";
	
	//echo "<form>";
	
	foreach ( $result5 as $row5 )
	{
		$valor5 = utf8_decode($row5["nometag"]);
		
			echo "<div id =\"divTag".$row5["idtag"]."\">
			<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row5["idtag"] . "\" value=\"" . $tag["idtag"] . "\" 
			onClick=\"toogle_checkbox('tagCB{$row5["idtag"]}', {$row5["idtag"]})\" >" . $valor5 . " 
			<span class = \"caseCountSpan\" id=\"spanTag" . $row5["idtag"] . "\">
			</span></div>";
			
		//$valor5 = utf8_decode($row5["nometag"]);
		//echo "<input type='checkbox' name={$valor5} id={$valor5} value={$valor5}>" . $valor5;
		//echo "</br>";
	}
	//echo "</form></td>";
	//echo "</tr>";
	
	echo "</div>";
	echo "<div class='deselectDiv'>";
	echo "<a href='javascript:void(0)' onClick='deselect_checkboxes('actionTag');'>";
	echo "Desselecionar";
	echo "</a></div>";
	echo "</td>"; //<<------------------------------------------------------------------ AQUI
	echo "</td></tr>";
	echo "</tr>";
	echo "</table>";
	echo "</br>";

	// fim
	
	// quadro 5---------------------------------------------------------------
	
	// aqui 
	echo "<table id='actionTypeTable' class='actionTypeTable'>";
	echo "<tr><td class='indexTags'>";
	echo "<div class='indexTitle'>";
	echo "Criados pelo Usuário : ";
	echo "<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	
	echo "<div id='actionTypeTagDiv'>";
	
	echo "<tr>";
	//echo "<td align='right'><label>Tag</label></td>";
	echo "<td align='left'>"; //<select name='nometag'>";
	
	//echo "<form>";
	
	foreach ( $result6 as $row6 )
	{
		$valor6 = utf8_decode($row6["nometag"]);
		
			echo "<div id =\"divTag".$row6["idtag"]."\">
			<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row6["idtag"] . "\" value=\"" . $tag["idtag"] . "\" 
			onClick=\"toogle_checkbox('tagCB{$row6["idtag"]}', {$row6["idtag"]})\" >" . $valor6 . " 
			<span class = \"caseCountSpan\" id=\"spanTag" . $row6["idtag"] . "\">
			</span></div>";
	}
	//echo "</form></td>";
	//echo "</tr>";
	
	echo "</div>";
	echo "<div class='deselectDiv'>";
	echo "<a href='javascript:void(0)' onClick='deselect_checkboxes('actionTag');'>";
	echo "Desselecionar";
	echo "</a></div>";
	echo "</td>"; //<<------------------------------------------------------------------ AQUI
	echo "</td></tr>";
	echo "</tr>";
	echo "</table>";
	echo "</br>";

	//echo "</table></tr>";
	// fim

	echo "</td>";
	echo "</form>";

	//aqui
	echo "</td>";
	
	// Aqui que eu coloco a busca realizada ... figuras de imagens com respectivos titulos e etc....
	echo "<td id='casesTd' class='casesTd'>	";
	echo "<table id='caseTable' class='caseTable'>";
	echo "<tr><td>";
	echo "<div id='resultDiv'></div>";
	
	
	// dentro do quadrado
		
	$titulo = utf8_encode($_POST["titulo"]);
	$tema = utf8_encode($_POST["tema"]);
	$idioma = utf8_encode($_POST["idioma"]);
	
	$query22 = "SELECT *
	FROM Caso 
	WHERE titulo like '%$titulo%' and tema like '%$tema%' and idioma like '%$idioma%'
	ORDER BY Caso.titulo";
	
		
	$result = $conn->ExecuteRead($query22);
	
	
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
		$return .= "<a href='telaprincipalcaso.php'>" . $valor . "</a>";
		$return .= "</td>";

		$return .= "<td colspan='1'>";
		$return .= "<label>" . $valor2 . "</label>";
		$return .= "</td>";
		
		$return .= "<td colspan='1'>";
		$return .= "<label>" . $valor7 . "</label>";
		$return .= "</td>";


		$return22 .= "</tr>";

	}
	header('Location: index.php?page=telaprincipal&ret1=' . $return);


	
	// fim do quadrado
	
	
	
	//fim
	
	if ( isset($_GET["ret1"]) )
        {
                echo $_GET["ret1"];
        }

		
	echo "</td></tr>";
	echo "</table>";
	echo "</tr>";
	echo "</table>";
	
	
	$conn->closeConnection();

?>