<?php

include "pdo.php";

$request = file_get_contents('php://input');
$requestJson = json_decode($request);

echo json_encode($requestJson);

 if ( !empty($_POST['id']) ){

     $modify_at= date("y-m-d H:i:s");
     $sql = "UPDATE lessons SET content=?, modify_at=? WHERE id_lesson=?";
     $stmt = $pdo->prepare($sql);
     $stmt->execute([$_POST['content'], $modify_at, $_POST['id']]);
     echo json-encode($_POST['content']);
 }
