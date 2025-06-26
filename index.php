<?php
global $BASE_URL;
require_once("db.php");
require_once("config.php");

$shortLink = $_GET['q'] ?? '';

if($shortLink != ''){
    $fullLink = getFullLink($shortLink);
    header("Location: $fullLink");
} else {
    header("Location: createlink.php");
}






