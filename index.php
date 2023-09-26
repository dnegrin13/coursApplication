<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Liste des cours</title>
</head>
<body>
    <header>
        <h1>Liste des cours</h1>
    </header>
    <div class="contenerRetAjoutlecons">
            <div class="rechercher">
                <label for="rechercher">Rechercher</label>
                <input type="text" name="rechercher" id="rechercher">
            <div class="AjoutLecons">
                <a class="lecons" href="form_update_lesson.php">Ajouter une leçon</a>
            </div>
            </div>
        </div>
            <div class="HTML-CSS">
                HTML/CSS
                <?php
                    include "pdo.php";

                    $sql = "SELECT * FROM lessons";
                    $stmt = $pdo->query($sql);
                    $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $count = $stmt->rowCount();
                ?>
                <ul>
                    <?php

                    if($count > 0){
                        foreach ($lessons as $lesson) {
                            echo 
                            "<li>
                            <a href='lesson.php?id=$lesson[id_lesson]'>$lesson[title]</a>
                            <a href='delete_lesson.php?id=$lesson[id_lesson]'><img src='img/garbage.svg' width='15px'></a>
                            <a href='form_update_lesson.php?id=$lesson[id_lesson]'><img src='img/pencil.svg' width='15px'></a>
                            </li>";
                        }
                    }else{
                        echo "<li>Aucun resultat trouvé.</li>";
                    }
                    ?>
                </ul>
    </div>
    <div class="contenerInfoEtHoraire">
        
    </div>
    <footer></footer>    


</body>
</html>