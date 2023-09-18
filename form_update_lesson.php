<?php
      include 'pdo.php';

      if(isset($_GET['id'])) {
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
    <link rel="stylesheet" href="node_modules/trumbowyg/dist/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="node_modules/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css">
    <link rel="stylesheet" href="node_modules/prismjs/themes/prism.css">
    <link rel="stylesheet" href="node_modules/trumbowyg/dist/plugins/highlight/ui/trumbowyg.highlight.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulaire de modification de cours</title>
</head>
<body>
    <h1>Formulaire de modification de cours</h1>

    <a href="index.php"><-Retour à la liste des leçons</a>

    <form action="update_lesson.php" method="post">

        <label for="title">Titre</label>
        <input type="text" name="title" value="<?= $lesson['title']?>">

        <label for="category">catégorie</label>
        <select name="category">
            <?php
                $category_array = [
                    "html"=> "HTML/CSS",
                    "javascript" => "Javacript",
                    "php" => "PHP"
                ];
                foreach($category_array as $value => $category){
                    if($value == $lesson['category']){
                        echo "<option selected value='$value'>$category</option>";
                    }else{
                    echo "<option value='$value'>$category</option>";
                    
                    }
            
                }
            
            ?>
            <option value="">veuillez choisir une catégorie</option>
            <option value="html">HTML/CSS</option>
            <option value="javascript">JavaScript</option>
            <option value="php">PHP</option>
        </select>

        <label for="content" class="label-textarea">Contenu de la leçon</label>
        <textarea name="content"  cols="200" rows="50" id="wys"><?= $lesson['content']?></textarea>
        <input type="hidden" name="id" value="<?= $lesson['id_lesson']?>">
        <input type="submit" value="Ajouter leçon">
    </form>

<script src="node_modules/jquery/dist/jquery.min.js" ></script>
<script src="node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
<script src="node_modules/trumbowyg/dist/langs/fr.min.js"></script>
<script src="node_modules/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js"></script>
<script src="node_modules/prismjs/prism.js"></script>
<script src="node_modules/trumbowyg/dist/plugins/highlight/trumbowyg.highlight.min.js"></script>
<script src="node_modules/prismjs/components/prism-markup-templating.js"></script>
<script src="node_modules/prismjs/components/prism-php.js"></script>
<script src="node_modules/prismjs/components/prism-typescript.js"></script>
<script src="node_modules/prismjs/components/prism-css.js"></script>
<script>
    $(document).ready( function() {
        $('#wys').trumbowyg({
            btns: [
                    ['viewHTML'],
                    ['highlight'],
                    ['undo', 'redo'], // Only supported in Blink browsers
                    ['formatting'],
                    ['strong', 'em', 'del'],
                    ['superscript', 'subscript'],
                    ['link'],
                    ['insertImage'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat'],
                    ['fullscreen'],
                    ['foreColor', 'backColor']]   
        });
    })

</script>
</body>
</html>