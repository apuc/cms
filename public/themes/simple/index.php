<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $options->get('title') ?></title>
    <?php $header->siteHead(); ?>
</head>
    <body>
        <h2>Привет</h2>
        <?php
            hello();
        ?>
    <?php $header->printScriptFooter(); ?>
    </body>
</html>