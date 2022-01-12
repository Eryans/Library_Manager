<?php
ob_start();
$title = "BiblioManager - Main";
require_once __DIR__ . "./../../controller/UserCtrl.class.php";
require_once __DIR__ . "./../../controller/LoginCtrl.class.php";
require_once __DIR__ . "./../../view/LoginView.class.php";

echo "<h1>Main Content page</h1>";


$content = ob_get_clean();
ob_start();
?>

<script>
    //alert('test');
</script>
<?php
$javascript = ob_get_clean();
require __DIR__ . "./../template.php";
