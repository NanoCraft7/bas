<?php
require_once 'classes/verkorderclass.php';

$verkooporder = new Verkooporder();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verkOrdId = $_POST['verkOrdId'];
    $verkOrdStatus = $_POST['verkOrdStatus'];

    $verkooporder->updateVerkooporderStatus($verkOrdId, $verkOrdStatus);
}

header('Location: verkooporders.php');
exit;
?>
