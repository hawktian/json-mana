<?php
header('Content-Type: application/json');
$res = [];
$res['result'] = 'failure';
$res['msg'] = '修改失败';
$path = dirname(__FILE__).'/tmp/';
$oldname = $path.$_GET['oldname'];
$newname = $path.$_GET['newname'];
if ( rename($oldname, $newname) ) {
    $res['result'] = 'success';
}
echo json_encode($res);
