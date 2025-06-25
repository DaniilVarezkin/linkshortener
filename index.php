<?php
require_once("db.php");

$shortLink = $_GET['q'] ?? '';

if($shortLink != ''){
    $fullLink = getFullLink($shortLink);
    header("Location: $fullLink");
} else {
    header("Location: ".LINK_BASE_URL."createlink.php");
}






