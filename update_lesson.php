<?php

include "pdo.php";

if (!empty($_POST['title']) 
&& !empty($_POST['id']) 
&& !empty($_POST['content'])){

    $modify_at= date("y-m-d H:i:s");
    $sql = "UPDATE lessons SET title=?, category=?, content=?, modify_at=? WHERE id_lesson=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['title'], 
                $_POST['category'], 
                $_POST['content'],
                $modify_at,
                $_POST['id']
            ]);
            header("Location:lesson.php?id=$_POST[id]");
            exit;
}
