<html>
	<head>
		<script>
			function myFunction()
			{
				alert("Cadastro com Sucesso");
				
				//document.write("<p>Titulo</p>");
				//window.location.assign("novocasoFormulario.php");
			
			/*  // inicio	
				var objForm = document.novocaso;
				var printTitulo = document.novocaso.titulo;
				var printTema = document.novocaso.tema;
				var objPreVis = document.getElementById("previsualizacao");
	
				var textoCompleto = "titulo: "+printTitulo.value+"<br>";
				textoCompleto += "tema: "+printTema.value+"<br><br>";
				textoCompleto += "<input type='button' onclick='enviaForm()' value='Enviar Formulário'>";
				
				objPreVis.innerHTML = textoCompleto;
				objForm.style.display = "none";
				objPreVis.style.display = "block";
				*/
			}
			/* // continuacao da funcao de cima que chama essa
			function enviaForm() {
				var objForm = document.form1;
				objForm.action = "novocasoFormulario.Form.php";
				objForm.method = "post";
				objForm.submit();
			} //fim 
			*/
		</script>
	</head>
</html>

<?php
	include_once "../persist/SqlManager.class.php";
	
	$conn = new SqlManager("connect");
	
	
	echo "<form action='novocaso.php' name='novocaso' method='post'>";
	echo "<table align='center' cellpadding='0' cellspacing='5px'>";
	echo "<tr>";
	
	echo "<td align='right'><label>Titulo:</label></td>";
	echo "<td align='left'><textarea name='titulo' rows='1'cols='30'></textarea></td>";
	//echo "<td align='left'><input type='text' name='titulo'/></td>";
	echo "</tr>";
	
	echo "<td align='right'><label>Tema:</label></td>";
	echo "<td align='left'><textarea name='tema' rows='1'cols='30'></textarea></td>";
	//echo "<td align='left'><input type='text' name='tema'/></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td align='right'><label>Descrição:</label></td>";
	echo "<td align='left'>
		<textarea name='descricao' rows='20'cols='80'></textarea>
	</td>";
	//echo "<td align='left'><input type='text' name='descricao'/></td>";
	echo "</tr>";
	echo "<tr>";
	
	
	echo "<td align='right'><label>Idioma:</label></td>";
	echo "<td align='left'><select name='idioma'>";
	echo "<option value='Portugues'>Português</option>";
	echo "<option value='Ingles'>Inglês</option>";
	echo "<option value='Espanhol'>Espanhol</option>";
	echo "</td></select>";
	
	
	//echo "<td align='left'><textarea name='idioma' rows='1'cols='20'></textarea></td>";
	
	
	//echo "<td align='left'><input type='text' name='idioma'/></td>";
	/*echo "</tr>";
	
		function envia_pdf()
			{
				// VERIFICA SE O CAMPO PDF ESTÁ VAZIO
				if ($_FILES['nomefoto']['name'] != "") {
					
					// SE O CAMPO NÃO ESTIVER VAZIO MOVE O ARQUIVO PARA UMA PASTA
					move_uploaded_file($_FILES['nomefoto']['tmp_name'],"PASTA/".$_FILES['nomefoto']['name']);
					 
					// $PDF_PATH É A VARIAVEL Q GUARDA O ENDEREÇO DO PDF(pra adicionar na base de dados)
					$pdf_path = "PASTA/".$_FILES['nomefoto']['name'];
				} 
				else {
					//CASO SEJA FALSO RETORNA ERRO
					echo "Não foi possível enviar o arquivo";
				}
			}*/
	
	
	
	// inicio: postar foto 
	echo "<tr>";
	echo "<td align='right'><label>Foto:</label></td>";
	//echo "<td name='nomefoto'><input id='attachmentInput1' name='attachment[]' type='file' onChange='on_file_select(this)' /></td>";//onclick='envia_pdf()'
	echo "<td><form action='upload.php' method='post' enctype='multipart/form-data'>";
	echo "<input type='file' name='nomefoto'>
		</br>
		</form></td>";
	echo "</tr>";
	// fim: postar foto
	
	
	
	// inicio 
	/*  **** no chidek :          checkbox +  Arquivo : + botao de choose file
	echo "<table><tbody id='attachmentsTbody'><tr>";
	echo "<td><input type='checkbox' id='attachmentCB1' disabled='true' onClick='on_attachment_checkbox_click(this)' /></td>";
	echo "<td>";
	echo "Arquivo: ";
	echo "<input id='attachmentInput1' name='attachment[]' type='file' onChange='on_file_select(this)' /></td>";
	echo "<td id='thumbTD1'></td>";
	echo "</tr>";
	echo "<tr id='noThumbRadioTR' style='display:none'>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td><input id='thumbRadio0' type='radio' name='thumbnailValue' value='' checked />";
	echo "Sem thumbnail";
	echo "</td>";
	echo "</tr>	";
	echo "</tbody>";
	echo "</table>";
	*/
	//fim
	
	// ************************************************************************************
	echo "<tr>";
	
	echo "<td align='right'><label>Nova Tag:</label></td>";
	echo "<td align='left'><textarea name='novatag' rows='1'cols='30'></textarea></td>";
	//echo "<td align='left'><input type='text' name='titulo'/></td>";
	echo "</tr>";
	
	// inicio : nova tag
	/*
	echo "<span class='addCaseTitle'>";
	echo "Tags";
	echo "</span><br/><br/>";
	echo "Selecione as tags que melhor descrevem o caso na lista abaixo: ";
	echo "<div id='tagListDiv'></div>";
	echo "<br/>";
	echo "Nova tag: ";
	echo "<input type='text' id='tagNameText'/>";
	echo "<button type='button' onClick='add_tag(false);'>";
	echo "Adicionar tag";
	echo "</button><br/>";
	echo "<div id='errorTagDiv' class='addCaseErrorText' style='display:none'></div>";
	echo "<div id='warningTagDiv' class='addCaseWarningText' style='display:none'></div>";
	echo "<br/><hr /><br/>";
	*/
	//fim : nova tag

	// ***************************************************************************************
	
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
	
	
	// aqui 
	echo "<table id='searchTableTelaToda' class='searchTableTelaToda'>";
	echo "<tr><td class='indexTags'>";
	echo "<div class='indexTitle'> Tipos de Ação : ";
	echo "<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	echo "<div id='actionTypeTagDiv'>";
	echo "<tr><td align='left'>"; //<select name='nometag'>";
	
	foreach ( $result2 as $row2 ) 
	{
		$valor2 = utf8_decode($row2["nometag"]);
		
			echo "<div id =\"divTag".$row2["idtag"]."\">
			<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row2["idtag"] . "\" value=\"" . $row2["idtag"] . "\" 
			onClick=\"toogle_checkbox('tagCB{$row2["idtag"]}', {$row2["idtag"]})\" >" . $valor2 . "  
			<span class = \"caseCountSpan\" id=\"spanTag" . $row2["idtag"] . "\">
			</span></div>";
	}
	echo "</td></tr>";
	echo "</div>";
	echo "</td>"; 
	
	echo "</tr>";
	// fim 
	
	// aqui 
	echo "<tr><td class='indexTags'>";
	echo "<div class='indexTitle'> Artefatos : ";
	echo "	<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	echo "<div id='actionTypeTagDiv'>";
	echo "<tr><td align='left'>"; //<select name='nometag'>";
	
	foreach ( $result3 as $row3 ) 
	{
		$valor3 = utf8_decode($row3["nometag"]);
		
			echo "<div id =\"divTag".$row3["idtag"]."\">
			<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row3["idtag"] . "\" value=\"" . $row3["idtag"] . "\" 
			onClick=\"toogle_checkbox('tagCB{$row3["idtag"]}', {$row3["idtag"]})\" >" . $valor3 . " 
			<span class = \"caseCountSpan\" id=\"spanTag" . $row3["idtag"] . "\">
			</span></div>";
	}
	
	echo "</div>";
	echo "</td>"; 
	echo "</td></tr>";
	echo "</tr>";
	// fim 
	// ********************************************
	// aqui 
	echo "<tr><td class='indexTags'>";
	echo "<div class='indexTitle'> Widgets : ";
	
	echo "<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	echo "<div id='actionTypeTagDiv'>";
	echo "<tr>";
	echo "<td align='left'>"; //<select name='nometag'>";
	
	foreach ( $result4 as $row4 )
	{
		$valor4 = utf8_decode($row4["nometag"]);
			
				echo "<div id =\"divTag".$row4["idtag"]."\">
				<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row4["idtag"] . "\" value=\"" . $row4["idtag"] . "\" 
				onClick=\"toogle_checkbox('tagCB{$row4["idtag"]}', {$row4["idtag"]})\" >" . $valor4 . " 
				<span class = \"caseCountSpan\" id=\"spanTag" . $row4["idtag"] . "\">
				</span></div>";
	}
		
	echo "</div>";
	echo "</td>"; 
	echo "</td></tr>";
	echo "</tr>";
	// fim
	// ********************************************
	// aqui 
	echo "<tr><td class='indexTags'>";
	echo "<div class='indexTitle'> Padrões : ";
	
	echo "<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	echo "<div id='actionTypeTagDiv'>";
	echo "<tr>";
	echo "<td align='left'>"; //<select name='nometag'>";
	
	foreach ( $result5 as $row5 )
	{
		$valor5 = utf8_decode($row5["nometag"]);
			
				echo "<div id =\"divTag".$row5["idtag"]."\">
				<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row5["idtag"] . "\" value=\"" . $row5["idtag"] . "\" 
				onClick=\"toogle_checkbox('tagCB{$row5["idtag"]}', {$row5["idtag"]})\" >" . $valor5 . " 
				<span class = \"caseCountSpan\" id=\"spanTag" . $row5["idtag"] . "\">
				</span></div>";
	}
		
	echo "</div>";
	echo "</td>"; //<<------------------------------------------------------------------ AQUI
	echo "</td></tr>";
	echo "</tr>";
	// fim
	
	// ********************************************
	// aqui 
	echo "<tr><td class='searchTableTelaToda'>";
	echo "<div class='indexTitle'> Criados pelo Usuário : ";
	
	echo "<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	echo "<div id='actionTypeTagDiv'>";
	echo "<tr>";
	echo "<td align='left'>"; //<select name='nometag'>";
	
	foreach ( $result6 as $row6 )
	{
		$valor6 = utf8_decode($row6["nometag"]);
			
				echo "<div id =\"divTag".$row6["idtag"]."\">
				<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row6["idtag"] . "\" value=\"" . $row6["idtag"] . "\" 
				onClick=\"toogle_checkbox('tagCB{$row6["idtag"]}', {$row6["idtag"]})\" >" . $valor6 . " 
				<span class = \"caseCountSpan\" id=\"spanTag" . $row6["idtag"] . "\">
				</span></div>";
	}
		
	echo "</div>";
	echo "</td>"; //<<------------------------------------------------------------------ AQUI
	echo "</td></tr>";
	echo "</tr>";
	// fim
	
	
	// ***************************************************************************************
	
	echo "<tr>";
	echo "<td colspan='2' align='center' onclick='myFunction()'><input type='submit' value='Salvar'/></td>";
	echo "</tr>";
	
	echo "<tr><td id='demo'></td></tr>";
	echo "</table>";
	echo "</table>";
	echo "</form>";
	

	if ( isset($_GET["ret1"]) )
	{
		echo $_GET["ret1"];
	}
	$conn->closeConnection();
?>