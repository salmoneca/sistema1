<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html> <!--lang="en"-->
	<head>
		<title>SISTEMA</title>
		<script type="text/javascript" src="../l_application/index_util.js"></script>
		
		<link href="../css/stylesheet.css" type="text/css" rel="stylesheet" />
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		
		<script type="text/javascript" src="general_util.js"></script>
		<!--<script type="text/javascript" src="../a_sistema/public_html/aulaphp/l_application/index_util.js"></script>-->
		<!-- <script type="text/javascript">-->
	
	<!--	<script type="text/javascript" src="index_util.js"></script> -->
	<!-- <link href="../l_application/index_util.js" type="text/javascript" rel="stylesheet" /> -->
	
	</head>
	<body>
		<div id="wrap">
				<div id="menu">
					<ul>
			
						<li><a href="index.php?page=telaprincipal" align="center">Tela Principal</a></li>
						<li><a href="index.php?page=novocaso" align="center">Novo Caso</a></li>
						<li><a href="index.php?page=cadastropessoa" align="center">Cadastro Pessoa</a></li>
						
						<li><a href="index.php?page=log" align="center">Login</a></li>
						<!-- Adicione aqui uma entrada para novas abas -->
						<li><a href="index.php?page=contato">Contato</a></li>
					</ul>
				</div>
				
			<div id="content">
					<?php
						if ( isset($_GET["page"]) ) // If is defined URL variable 'page'
						{
							$page = $_GET["page"];
							if ( strcmp($page, "telaprincipal") == 0 )
								include "telaprincipal.Form.php"; // include page telaprincipal
							elseif ( strcmp($page, "novocaso") == 0 ) //else if is defined URL variable 'novocaso'
								include "novocaso.Form.php"; // include page novocaso
							elseif ( strcmp($page, "cadastropessoa") == 0 )
								include "cadastropessoa.Form.php";
							elseif ( strcmp($page, "log") == 0 )
								include "log.Form.php";
							elseif ( strcmp($page, "telaprincipalcaso") == 0 )
								include "telaprincipalcaso.php";	
							elseif ( strcmp($page, "contato") == 0 )
								include "contato.php";
							elseif ( strcmp($page, "novocasoFormulario") == 0 )
								include "novocasoFormulario.Form.php";
							
							/* Adicione aqui uma entrada para novas abas */
						}
					?>
			</div>
		</div>
	</body>
</html>
