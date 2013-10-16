<html>
	<head>
		<script>
			function myFunction()
			{
				alert("Cadastro com Sucesso");
				
				//document.write("<p>Titulo</p>");
				//window.location.assign("novocasoFormulario.php");
			}
		</script>
	</head>
</html>

<?php
	include_once "../persist/SqlManager.class.php";
	
	$conn = new SqlManager("connect");
	
	
	echo "<form action='novocaso.php' name='novocaso' method='post' enctype='multipart/form-data' class='yui-skin-sam'>";
	echo "<table align='center' cellpadding='0' cellspacing='5px'>";
	echo "<tr>";
	
	// inicio:Para colocar o Text Editing Tools
	echo "
	<link rel='stylesheet' type='text/css' href='http://yui.yahooapis.com/2.9.0/build/menu/assets/skins/sam/menu.css' />
	<link rel='stylesheet' type='text/css' href='http://yui.yahooapis.com/2.9.0/build/button/assets/skins/sam/button.css' />
	<link rel='stylesheet' type='text/css' href='http://yui.yahooapis.com/2.9.0/build/fonts/fonts-min.css' />
	<link rel='stylesheet' type='text/css' href='http://yui.yahooapis.com/2.9.0/build/container/assets/skins/sam/container.css' />
	<link rel='stylesheet' type='text/css' href='http://yui.yahooapis.com/2.9.0/build/editor/assets/skins/sam/editor.css' />
	<script src='http://yui.yahooapis.com/3.5.0/build/yui/yui-min.js'></script>
	<script type='text/javascript' src='http://yui.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js'></script>
	<script type='text/javascript' src='http://yui.yahooapis.com/2.9.0/build/animation/animation-min.js'></script>
	<script type='text/javascript' src='http://yui.yahooapis.com/2.9.0/build/connection/connection-min.js'></script>
	<script type='text/javascript' src='http://yui.yahooapis.com/2.9.0/build/element/element-min.js'></script>
	<script type='text/javascript' src='http://yui.yahooapis.com/2.9.0/build/container/container-min.js'></script>
	<script type='text/javascript' src='http://yui.yahooapis.com/2.9.0/build/menu/menu-min.js'></script>
	<script type='text/javascript' src='http://yui.yahooapis.com/2.9.0/build/button/button-min.js'></script>
	<script type='text/javascript' src='http://yui.yahooapis.com/2.9.0/build/editor/editor-min.js'></script>
	";
	echo "<script>(function() { 
	    //Setup some private variables 
	    var Dom = YAHOO.util.Dom, 
	        Event = YAHOO.util.Event; 
	 
	        //The Editor config 
	        var myConfig = { 
	            height: '300px', 
	            width: '600px', 
	            animate: true, 
	            dompath: true, 
	            focusAtStart: true 
	        }; 
	 
	    //Now let's load the Editor.. 
	    var myEditor = new YAHOO.widget.Editor('editor', myConfig); 
	    myEditor.render(); 
	})(); 
		</script>";
		
	echo "<script>
		var stripHTML = /<\S[^><]*>/g; 
		myEditor.get('textarea').value = myEditor.get('textarea').value.replace(/<br>/gi, '\n').replace(stripHTML, ''); 
		 
		//From the textarea to the Editor 
		myEditor.setEditorHTML(myEditor.get('textarea').value.replace(/\n/g, '<br>')); 
	</script>";
	
	echo "<script>
		myEditor.saveHTML(); 
		var stripHTML = /<\S[^><]*>/g; 
		myEditor.get('textarea').value = myEditor.get('textarea').value.replace(/<br>/gi, '\n').replace(stripHTML, ''); 
		 
		var fc = myEditor.get('element').previousSibling, 
			el = myEditor.get('element'); 
		 
		Dom.setStyle(fc, 'position', 'absolute'); 
		Dom.setStyle(fc, 'top', '-9999px'); 
		Dom.setStyle(fc, 'left', '-9999px'); 
		myEditor.get('element_cont').removeClass('yui-editor-container'); 
		Dom.setStyle(el, 'visibility', 'visible'); 
		Dom.setStyle(el, 'top', ''); 
		Dom.setStyle(el, 'left', ''); 
		Dom.setStyle(el, 'position', 'static'); 
	</script>";
	
	echo "
	<script>	
	var fc = myEditor.get('element').previousSibling, 
	    el = myEditor.get('element'); 
	 
	Dom.setStyle(fc, 'position', 'static'); 
	Dom.setStyle(fc, 'top', '0'); 
	Dom.setStyle(fc, 'left', '0'); 
	Dom.setStyle(el, 'visibility', 'hidden'); 
	Dom.setStyle(el, 'top', '-9999px'); 
	Dom.setStyle(el, 'left', '-9999px'); 
	Dom.setStyle(el, 'position', 'absolute'); 
	myEditor.get('element_cont').addClass('yui-editor-container'); 
	YAHOO.log('Reset designMode on the Editor', 'info', 'example'); 
	myEditor._setDesignMode('on'); 
	YAHOO.log('Inject the HTML from the textarea into the editor', 'info', 'example'); 
	myEditor.setEditorHTML(myEditor.get('textarea').value.replace(/\n/g, '<br>')); 
	</script>
	";
	// fim:Para colocar o Text Editing Tools
	
	echo "<br><h3 align='center'>Criar Novo Caso</h3>";
	echo "<td align='right'><label>Titulo:</label></td>";
	//echo "<td align='left'><textarea name='titulo' rows='1' cols='40'></textarea></td>";
	echo "<td align='left'><input type='text' size='20' name='titulo'/></td>";
	echo "</tr>";
	
	echo "<td align='right'><label>Tema:</label></td>";
	//echo "<td align='left'><textarea name='tema' rows='1'cols='30'></textarea></td>";
	echo "<td align='left'><input type='text' size='20' name='tema'/></td>";
	echo "</tr>";
		
	echo "<tr>";
	echo "<td align='right'><label>Descrição:</label></td>";
	echo "<td align='left'>";	
		echo "<br><span>Recomendamos o uso do template oferecido, mas fique à vontade para não usa-lo.(Max.3000 caracteres)</span>";
		echo "<textarea id='editor' name='editor' rows='20' cols='145'>";
		echo "
		<strong style='font-size: 18px; '>Problema</strong><br>
		<ul>
		<li>Quem é o usuário?</li>
		<li>O que ele precisa fazer?</li>
		<li>Como ele quer fazer? Quando? Por quê?</li>
		</ul>
		<br>
		<strong style='font-size: 18px; '>Solução</strong><br>
		<ul>
		<li>Qual é a solução?</li>
		<li>Quando ela deve ser utilizada? Como? Por quê?</li>
		<li>Como essa solução se compara as de outros sistemas?</li>
		</ul>
		<br>
		<strong style='font-size: 18px; '>Avaliação</strong><br>
		<ul>
		<li>O que deu certo nessa solução? Por quê?</li>
		<li>O que deu errado nessa solução? Por quê?</li>
		<li>Qual é a avaliação geral dessa solução (sucesso ou fracasso)?</li>
		</ul>
		";
	echo "</textarea><br>";
	echo "</td>";
	echo "</tr>";	
	
	/*
	echo "<td align='right'><label>Descrição:</label></td>";
	echo "<td align='left'>
		<textarea name='descricao' rows='20'cols='145'>";
			echo "
I) Problema
			
	- Quem é o usuário?
	- O que ele precisa fazer?
	- Como ele quer fazer? Quando? Por quê?
			
II) Solução
			
	- Qual é a solução?
	- Quando ela deve ser utilizada? Como? Por quê?
	- Como essa solução se compara as de outros sistemas?
			
III) Avaliação
			
	- O que deu certo nessa solução? Por quê?
	- O que deu errado nessa solução? Por quê?
	- Qual é a avaliação geral dessa solução (sucesso ou fracasso)?";

	echo "</textarea></td>";
	//echo "<td align='left'><input type='text' name='descricao'/></td>";*/
	//echo "</tr>";
	
	echo "<tr>";
	echo "<td align='right'><label>Idioma:</label></td>";
	echo "<td align='left'><select name='idioma'>";
	echo "<option value='Portugues' selected>Português</option>";
	echo "<option value='Ingles'>Inglês</option>";
	echo "<option value='Espanhol'>Espanhol</option>";
	echo "</td></select>";
	
	// inicio: postar foto 
	echo "<tr>";
	echo "<td align='right'><label>Foto:</label></td>";
	//echo "<td name='nomefoto'><input id='attachmentInput1' name='attachment[]' type='file' onChange='on_file_select(this)' /></td>";//onclick='envia_pdf()'
	//echo "<td><form action='upload.php' method='post' enctype='multipart/form-data'>";
	echo "<td>";
	echo "<input type='file' name='nomefoto'/></br>(O limite de tamanho é de 20 MB.)";
	//echo "</form>";
	echo "</td>";
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
	/*echo "
	<script>
		var xmlhttp = false;

		try {
		xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
		alert ('You are using Microsoft Internet Explorer.');
		} catch (e) {
		try {

		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		alert ('You are using Microsoft Internet Explorer');
		} catch (E) {

		xmlhttp = false;
		}
		}

		if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
		alert ('You are not using Microsoft Internet Explorer');
		}
		
		function makerequest(serverPage, objID) {
			var obj = document.getElementById(objID);
			xmlhttp.open('GET', serverPage);
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			obj.innerHTML = xmlhttp.responseText;
			}
			}
			xmlhttp.send(null);
			}
	</script>
	";*/
	// ************************************************************************************
	echo "<tr>";
	echo "<td align='right'><label><br>Nova Tag:</label>
	</td>";
	echo "<td align='left'><br><textarea name='nometag' rows='1'cols='30'></textarea>
	<input type='button' id='actionDivToggle' onClick='getScores();' value='Adicionar Tag'>
	</td>";
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
	echo "<input type='button' id='actionDivToggle' onClick='loadXMLDoc();' value='-'>";
	echo "</div>";
	echo "<div id='actionTypeTagDiv'>";
	echo "<tr><td align='left' class='caseTableDescricao'>"; //<select name='nometag'>";
	
	foreach ( $result2 as $row2 ) 
	{
		$valor2 = utf8_decode($row2["nometag"]);
			
			echo "<a id =\"divTag".$row2["idtag"]."\">
			<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row2["idtag"] . "\" value=\"" . $row2["idtag"] . "\" 
			onClick=\"toogle_checkbox('tagCB{$row2["idtag"]}', {$row2["idtag"]})\" >" . $valor2 . "  
			<span class = \"caseCountSpan\" id=\"spanTag" . $row2["idtag"] . "\">
			</span></a>";
	}
	echo "</td></tr>";
	echo "</div>";
	echo "</td>"; 
	
//	echo "</tr>";
	// fim 
	
	// aqui 
	echo "<tr><td class='indexTags'>";
	echo "<div class='indexTitle'> Artefatos : ";
	echo "	<input type='button' id='actionDivToggle' onClick='toogle_div('actionTypeTagDiv', 'actionDivToggle');' value='-'>";
	echo "</div>";
	echo "<div id='actionTypeTagDiv'>";
	echo "<tr><td align='left' class='caseTableDescricao'>"; //<select name='nometag'>";
	
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
	echo "<td align='left' class='caseTableDescricao'>"; //<select name='nometag'>";
	
	foreach ( $result4 as $row4 )
	{
		$valor4 = utf8_decode($row4["nometag"]);
			
				echo "<a id =\"divTag".$row4["idtag"]."\">
				<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row4["idtag"] . "\" value=\"" . $row4["idtag"] . "\" 
				onClick=\"toogle_checkbox('tagCB{$row4["idtag"]}', {$row4["idtag"]})\" >" . $valor4 . " 
				<span class = \"caseCountSpan\" id=\"spanTag" . $row4["idtag"] . "\">
				</span></a>";
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
	echo "<td align='left' class='caseTableDescricao'>"; //<select name='nometag'>";
	
	foreach ( $result5 as $row5 )
	{
		$valor5 = utf8_decode($row5["nometag"]);
			
				echo "<a id =\"divTag".$row5["idtag"]."\">
				<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row5["idtag"] . "\" value=\"" . $row5["idtag"] . "\" 
				onClick=\"toogle_checkbox('tagCB{$row5["idtag"]}', {$row5["idtag"]})\" >" . $valor5 . " 
				<span class = \"caseCountSpan\" id=\"spanTag" . $row5["idtag"] . "\">
				</span></a>";
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
	echo "<td align='left' class='caseTableDescricao'>"; //<select name='nometag'>";
	
	foreach ( $result6 as $row6 )
	{
		$valor6 = utf8_decode($row6["nometag"]);
			
				echo "<a id =\"divTag".$row6["idtag"]."\">
				<input type=\"checkbox\" name=\"actionTag\" id=\"tagCB" . $row6["idtag"] . "\" value=\"" . $row6["idtag"] . "\" 
				onClick=\"toogle_checkbox('tagCB{$row6["idtag"]}', {$row6["idtag"]})\" >" . $valor6 . " 
				<span class = \"caseCountSpan\" id=\"spanTag" . $row6["idtag"] . "\">
				</span></a>";
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
	
	echo "</table>";
	echo "</table>";
	echo "</form>";
	

	if ( isset($_GET["ret1"]) )
	{
		echo $_GET["ret1"];
	}
	
	$conn->closeConnection();
?>