<?php
include "pdo.php";

$lesson = []; // Initialisez $lesson pour éviter une erreur si $_GET['id'] n'est pas défini.

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = 'SELECT * FROM lessons WHERE id_lesson=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $lesson = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de modification de cours</title>
    <link rel="stylesheet" href="node_modules/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css">
    <link rel="stylesheet" href="node_modules/trumbowyg/dist/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="node_modules/prismjs/themes/prism.css">
    <link rel="stylesheet" href="node_modules/trumbowyg/dist/plugins/highlight/ui/trumbowyg.highlight.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Formulaire de modification de cours</h1>
    <a href="index.php">Retour à la liste des leçons</a>
    <form action="update_lesson.php" method="post">

        <label for="title">Titre</label>
        <input type="text" name="title" value="<?= htmlspecialchars($lesson['title']) ?>">

        <label for="category">Catégorie</label>
        <select name="category">
            <?php
            $category_array = [
                "html" => "HTML/CSS",
                "javascript" => "Javascript",
                "php" => "PHP"
            ];

            foreach ($category_array as $value => $category) {
                $selected = ($value == $lesson["category"]) ? "selected" : "";
                echo "<option value='$value' $selected>$category</option>";
            }
            ?>

        </select>

        <label for="content">Leçon</label>
        <textarea name="content" id="wys" cols="250" rows="10"><?= htmlspecialchars($lesson['content']) ?></textarea>

        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="Modifier la leçon">

    </form>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
    <script src="node_modules/trumbowyg/dist/langs/fr.min.js"></script>
    <script src="node_modules/trumbowyg/dist/plugins/lineheight/trumbowyg.lineheight.min.js"></script>
    <script src="node_modules/trumbowyg/dist/plugins/history/trumbowyg.history.min.js"></script>
    <script src="node_modules/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js"></script>
    <script src="node_modules/prismjs/prism.js"></script>
    <script src="node_modules/prismjs/components/prism-markup-templating.js"></script>
    <script src="node_modules/prismjs/components/prism-php.js"></script>
    <script src="node_modules/prismjs/components/prism-typescript.js"></script>
    <script src="node_modules/trumbowyg/dist/plugins/highlight/trumbowyg.highlight.min.js"></script>
    <script src="node_modules/trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js"></script>
    <script src="node_modules/trumbowyg/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#wys').trumbowyg({
                btns: [
                    ['viewHTML'],
                    ['fontfamily'],
                    ['fontsize'],
                    ['historyUndo', 'historyRedo'],
                    ['lineheight'],
                    ['undo', 'redo'],
                    ['formatting'],
                    ['highlight'],
                    ['strong', 'em', 'del'],
                    ['superscript', 'subscript'],
                    ['link'],
                    ['insertImage'],
                    ['foreColor', 'backColor'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat'],
                    ['fullscreen']
                ]
            });
        });
    </script>
</body>
</html>