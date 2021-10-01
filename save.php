<?php
header('Content-Type: application/json');
$name = $_GET['name']?:time().uniqid();
$http_body = file_get_contents('php://input');
if ( !file_exists('./tmp') ) {
    mkdir('./tmp', 0700);
}
file_put_contents('./tmp/'.$name, $http_body);
$res = [];
$res['url'] = 'view.php?name='.$name;
echo json_encode($res);
