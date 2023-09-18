<?php
    include 'pdo.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = 'SELECT * FROM lessons WHERE id_lesson=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $lesson = $stmt->fetch(PDO::FETCH_ASSOC);
        
        date_default_timezone_set( 'Europe/Paris' );
        function objet_date_format($datetime)
        {
            $fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::NONE, IntlDateFormatter::NONE);
            $fmt->setPattern('EEEE dd MMMM YYYY HH:mm');
            return $fmt->format($datetime);
        }
        $date = new DateTime( $lesson['create_at']);
        $modify = new DateTime($lesson['modify_at']);
    }else{
        header("Location:index.php");
        exit;
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
    <title><?= $lesson['title']?></title>
</head>
<body>
    
    <h1><?= $lesson['title']?></h1>

    <h3><i>Leçon ajoutée le : <?=objet_date_format($date)?></i></h3>
    <?php
        if(isset($lesson['modify_at'])){
            $modify_date = objet_date_format($modify);
            echo "<h3><i>Leçon modifiée le : $modify_date</i></h3>";
        }
    
        echo $lesson['content'];
    
    ?>

</body>
</html>