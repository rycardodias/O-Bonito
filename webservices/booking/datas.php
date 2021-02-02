<?php

include ("webservices/config.php");

//Torna a data minima de checkin para o dia de hoje
date_default_timezone_set('Europe/Lisbon');
$dataatual = date("Y-m-d");
$dataseguinte = date('Y-m-d', strtotime('+1 day', strtotime($dataatual)));

?>