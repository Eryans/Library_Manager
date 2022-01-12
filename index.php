<?php
ob_start();
$title = "BiblioManager";
?>
<h1>This is index.php</h1>

<?php
var_dump($_GET["action"]);
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION["userID"])) {
	$title = "BiblioManager - Log in";
	require "./controller/controller_login.php";
} else {
	if (isset($_GET)){
		if ($_GET["action"] = "main"){
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
