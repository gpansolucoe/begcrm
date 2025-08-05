<?php
    include_once '../endpoints/status.php';
    //session_start();
    $status = new Status();
    echo $status->getStatus();
?>
