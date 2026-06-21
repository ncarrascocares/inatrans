<?php
// Compatibility redirect: some requests hit /inatrans/vista/ expecting an index
header('Location: /inatrans/index.php');
exit;

?>
