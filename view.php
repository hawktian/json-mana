<!DOCTYPE HTML>
<html>
<head>
  <title>JSONEditor | Switch mode</title>

  <!-- when using the mode "code", it's important to specify charset utf-8 -->
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

  <link href="./jsoneditor/jsoneditor.css" rel="stylesheet" type="text/css">
  <script src="./jsoneditor/jsoneditor.js"></script>

  <style type="text/css">
    body {
      font: 10.5pt arial;
      color: #4d4d4d;
      line-height: 150%;
    }

    code {
      background-color: #f5f5f5;
    }

    h1 {
        font-size: 18px;
    }

    #jsoneditor {
      width: 98%;
        height:98vh;
    }
  </style>
</head>
<body>
<div><h1><?php echo $_GET['name'];?></h1></div>
<div id="jsoneditor"></div>
<script>
  var container = document.getElementById('jsoneditor');

  var options = {
    mode: 'code',
    modes: ['code', 'form', 'text', 'tree', 'view'], // allowed modes
    onError: function (err) {
      alert(err.toString());
    },
    onModeChange: function (newMode, oldMode) {
      console.log('Mode switched from', oldMode, 'to', newMode);
    }
  };

<?php
if ( $_GET['name'] ) {
    $json = file_get_contents('./tmp/'.$_GET['name']);
} else {
    $json = '{}';
}
?>

  var json = <?php echo $json; ?>;
  var editor = new JSONEditor(container, options, json);
</script>
</body>
</html>
