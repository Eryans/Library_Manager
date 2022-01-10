<?php
ob_start();
$title = "BiblioManager";

require_once __DIR__."/controller/UserCtrl.class.php";
$user = new UserCtrl();
//$user->setUser("johnDoe","1234",FALSE);
$data = $user->getUser(); 
var_dump($data[1]["password"]);
$hash = $data[1]["password"];
var_dump(password_verify("1234",trim($hash)));

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
