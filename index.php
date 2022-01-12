<?php
ob_start();
$title = "BiblioManager";
?>
<h1>This is index.php</h1>

<?php
session_start();
if (!isset($_SESSION["userID"])){
  header("Location:template/pages/login.php");
} else {
  header("Location:template/pages/main.php");
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
