<?php
require("global.php");

require("php_console.php");
PhpConsole::start();

?>

<form method="post" action="validate.php">
<label>Username:</label>
<input type="text" name="username" maxlength="50" />
<label>Senha:</label>
<input type="password" name="password" maxlength="50" />
<input type="submit" value="Login" />
</form>
