<?php
require_once __DIR__ . '/config.php';

$pdo = new PDO(DB_CONNECTION_STRING);
try {
    $sql = "create table if not exists links (
                'id' integer primary key autoincrement not null,
                'link' text not null,
                'shortlink' text not null
            )";

    $pdo->exec($sql);
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

function getFullLink(string $name) : string{
    global $pdo;
    $sql = "select link from links where shortlink = '" . $name . "';";

    return $pdo->query($sql)->fetchColumn();
}

function addNewShortLinkMap(string $link ,string $shortLink)  {
    global $pdo;
    $sql = "insert into links (link, shortlink) values (:link, :shortlink)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":link", $link);
    $stmt->bindValue(":shortlink", $shortLink);
    $stmt->execute();
}

function getLastName(): string{
    global $pdo;
    $sql = "select shortlink from links order by id  desc limit 1";
    $lastShortLink =  $pdo->query($sql)->fetchColumn();
    return $lastShortLink;
}

