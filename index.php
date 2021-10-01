<!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <title></title>
    <base target="_blank" />
    </head>
    <body>
<p><a href='editor.php' />editor</p>

<?php
$path = dirname(__FILE__).'/tmp/';
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $file) {
    if (!$file->isDir()) {
        echo '<p>';
        echo '<a href=./view.php?name='.$file->getFilename().'>'.$file->getFilename().'</a>';
        echo '</p>';
    }
}
?>

    </body>
    </html>
