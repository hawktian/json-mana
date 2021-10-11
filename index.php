<!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <title></title>
    </head>
    <body>

<p><a href='editor.php' />editor</a></p>

<h2>JSON </h2>

<?php
$path = dirname(__FILE__).'/tmp/';
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $file) {
    if (!$file->isDir()) {
        echo '<p>';
        echo '<a href="./view.php?name='.$file->getFilename().'" target=_blank>'.$file->getFilename().'</a>';
        echo '&nbsp;&nbsp;&nbsp;';
        echo '<a href="./delete.php?name='.$file->getFilename().'" target=_self>删除</a>';
        echo '</p>';
    }
}
?>
</body>
</html>
