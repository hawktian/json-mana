<?php
$file = './tmp/'.$_GET['name'];
$msg = 'delete json file failure';
if ( file_exists($file) ) {
    if ( true == unlink($file) ) {
        $msg = 'delete json file success';
    }
}
?>

<!DOCTYPE html>
<html>
  
<head>
    <title>
    </title>
      
    <script>
        function autoRefresh() {
            window.location = 'index.php';
        }
        setInterval('autoRefresh()', 1000);
    </script>
</head>
  
<body>
<h1><?php echo $msg;?></h1>
</body>
  
</html>
