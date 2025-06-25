<?php

require_once("db.php");
require_once ("config.php");

//$userLink = $_POST['user-link'];
//
//echo 'Новая ссылка: '.createShortLink($userLink);

function generateNewName() : string
{
    $name = getLastName();
    if(!empty($name)){
        $lastChar = substr($name, -1);
        $linkWithoutLastChar = substr($name, 0, -1);
        if($lastChar == '9'){
            $lastChar = 'a';
            return $linkWithoutLastChar . $lastChar;
        }
        else if($lastChar === 'z'){
            return $linkWithoutLastChar . $lastChar . '0';
        }
        else {
            $lastChar++;
            return $linkWithoutLastChar . $lastChar;
        }
    } else {
        return 'a';
    }
}

function createShortLink(string $link) : string
{
    $newName = generateNewName();
    addNewShortLinkMap($link, $newName);
    $shortLink = LINK_BASE_URL.'?q='.$newName;

    return $shortLink;
}
