<?php
session_start();

$tamuId = $_SESSION["tamu_id"];
;


$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    unset($_SESSION['notification']);
}


