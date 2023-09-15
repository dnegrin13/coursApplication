<?php

include "pdo.php";


if (!empty($_POST['title']) 
&& !empty($_POST['category']) 
&& !empty($_POST['content']) ){

$create_at = date("y-m-d H:i:s");
$sql = "INSERT INTO lessons(title, category, content, create_at, modify_at) 
VALUES (?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(
[   
    $_POST['title'],
    $_POST['category'],
    $_POST['content'],
    $create_at,
    null
]);
$status = "success";
header("location:form_add_lesson.php?message=Le contact a bien été enregistré&status=$status");
exit;

}else{
    $status = "fail";
    header("location:form_add_lesson.php?message=Le formulaire n'a pas été rempli correctement&status=$status");
exit;

}