<?php
header('Content-Type: application/json');
$res = [];
$res['result'] = 'failure';
$res['msg'] = '保存失败';

$name = $_GET['name'];

if ( false !== strstr($name, '/') ) {
    $res['msg'] = 'file name contain slash was forbidden';
    $name = trim($name, '/');
    $name = str_replace('/', '-', $name);
}

$name = $name?:time().uniqid();
$http_body = file_get_contents('php://input');
if ( !file_exists('./tmp') ) {
    mkdir('./tmp', 0700);
}
if ( false !== file_put_contents('./tmp/'.$name, $http_body) ) {
    $res['result'] = 'success';
    $res['url'] = 'view.php?name='.$name;
}
END:
echo json_encode($res);
