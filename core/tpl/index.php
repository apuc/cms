<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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