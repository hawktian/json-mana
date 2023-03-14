<!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <title></title>
    </head>
    <body>
    <p><a href='editor.php' target=_blank />editor</a></p>

<?php
$path = dirname(__FILE__).'/tmp/';
$files = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $file) {
    if (!$file->isDir()) {
        $files[$file->getCTime()] = $file;
    }
}
krsort($files);
foreach ( $files ?? [] as $file) {
    echo '<p>';
    echo date('m-d H:i', $file->getCtime()).str_repeat('&nbsp;', 6).'<a href="./view.php?name='.$file->getFilename().'" target=_blank>'.$file->getFilename().'</a>';
    echo '&nbsp;&nbsp;&nbsp;';
    echo '<a href="./delete.php?name='.$file->getFilename().'" target=_self>删除</a>';
    echo '</p>';
}


?>
</body>
</html>
