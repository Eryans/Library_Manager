<?php
ob_start();
require __DIR__."/config/config.php";
require_once __DIR__ . "/model/DAO.php";

$title = "BiblioManager";
?>
<h1>This is index.php</h1>

<?php

if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION["userID"])) {
	$title = "BiblioManager - Log in";
	require "./controller/controller_login.php";
} else {
	if (isset($_GET["action"])){
		if ($_GET["action"] === "main"){
			$title = "BiblioManager - Main";
			require "./controller/controller_main.php";
		}
	}
}

$content = ob_get_clean();
ob_start();
?>

<script>
	//alert('test');
</script>
<?php
$javascript = ob_get_clean();
require __DIR__ . "/template/template.php";
