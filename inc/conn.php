<?php
require('config.php');

function condb($h,$u,$p){
    try{
        $db = new PDO($h, $u, $p);
        return $db;
    }catch(PDOException $e){
        echo 'DB接続エラー：' .$e->getMessage();
    }
}
?>