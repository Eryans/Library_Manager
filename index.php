<?php
ob_start();
$title = "BiblioManager";
require __DIR__."/template/pages/login.php";

?>
<h1>Hello World this is a php app project</h1>
<?php
$content = ob_get_clean();
ob_start();
?>
<script>
  //alert('test');
</script>
<?php
$javascript = ob_get_clean();
require __DIR__ . "/template/template.php";