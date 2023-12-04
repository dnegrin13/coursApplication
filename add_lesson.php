<?php

include "pdo.php";


if (!empty($_POST['title']) 
&& !empty($_POST['category'])  ){

    if ( checkTitle($_POST['title'])){
        $title = $_POST['title'];
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
        $sql_lesson = "SELECT id_lesson FROM lessons WHERE title = '$title'";
        $stmt_lesson = $pdo->query($sql_lesson);
        $idLesson = $stmt_lesson->fetch(PDO::FETCH_ASSOC);
        $id = $idLesson['id_lesson'];
        $status = "success";
        header("location:form_update_lesson.php?message=La leçon a bien été enregistré.&status=$status&id=$id");
        exit;
    }else{
        $status = "fail";
        header("location:index.php?message=Le title de la leçon existe déjà.&status=$status");
        exit;
    }

}else{
    $status = "fail";
    header("location:index.php?message=Le formulaire n'a pas été rempli correctement.&status=$status");
    exit;

}

function checkTitle($title) : bool {
    include "pdo.php";
    $sql = "SELECT * FROM lessons WHERE title='$title'";
    $stmt = $pdo->query($sql);
    $titleArray = $stmt->fetch(PDO::FETCH_ASSOC);
    $title = $titleArray['title'];
    return $title == null ? true : false;
}