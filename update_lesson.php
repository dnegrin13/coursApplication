<?php

include "pdo.php";

$request = file_get_contents('php://input');
$requestJson = json_decode($request);

echo json_encode($requestJson);

if(!empty($_POST['id'])){

    if ( isset($_POST['content']) ){
        update($_POST['content'], "content");
    }

    if (  isset($_POST['title']) ){
        update($_POST['title'], "title");
    }

    if (  isset($_POST['category']) ){
        update($_POST['category'], "category");
    }
}

function update($valueToUpdate, $columnName) {
    include "pdo.php";
    $modify_at= date("y-m-d H:i:s");
    // On recupère la clé du tableau associatif pour le faire correspondre au nom de la colonne, ATTENTION le nom de la clé doit correspondre au nom de la colonne
    // $_POST['jambon'] => jambon, $_POST['autruche'] => autruche
    $columnName = array_keys($valueToUpdate);
    $sql = "UPDATE lessons SET $columnName=?, modify_at=? WHERE id_lesson=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$valueToUpdate, $modify_at, $_POST['id']]);
    echo json_encode($valueToUpdate);
    die();
}

 