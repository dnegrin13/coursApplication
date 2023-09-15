<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/trumbowyg/dist/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulaire d'ajout de cours</title>
</head>
<body>
    <h1>Formulaire d'ajout de cours</h1>

    <form action="add_lesson.php" method="post">

        <label for="title">Titre</label>
        <input type="text" name="title">

        <label for="category">catégorie</label>
        <select name="category">
            <option value="">veuillez choisir une catégorie</option>
            <option value="html">HTML/CSS</option>
            <option value="javascript">JavaScript</option>
            <option value="php">PHP</option>
        </select>

        <label for="content" class="label-textarea">Contenu de la leçon</label>
        <textarea name="content"  cols="200" rows="50" id="wys"></textarea>
        <input type="submit" value="Ajouter leçon">
    </form>

<script src="node_modules/jquery/dist/jquery.min.js" ></script>
<script src="node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
<script src="node_modules/trumbowyg/dist/langs/fr.min.js"></script>
<script>
    $(document).ready( function() {
        $('#wys').trumbowyg({
            
        });
    })

</script>
</body>
</html>