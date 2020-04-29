<?php

try {
    $db = new PDO('mysql:host=localhost:3306;dbname=momoirot_uts','momoirot_P1nkRose','YHKKYUDHA9101720');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print $e->getMessage();
    die();
}
