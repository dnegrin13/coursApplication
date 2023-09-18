<?php

include "pdo.php";

if(isset($_GET["id"])){
    $sql = "DELETE FROM lessons WHERE id_lesson=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    if($stmt->rowCount() > 0) {
        $status = "success";
        header("Location:index.php?message=La lesson a été supprimer avec sccess&status=$status");
        exit;
    }else {
        $status = 'fail';
        header("Location:index.php?message=Une erreur est surnenue lors de la supression&status=$status");
        exit;
    }
}else {
    $status = 'fail';
    header("Location:index.php?message=Une erreur est surnenue lors de la supression&status=$status");
    exit;
}

