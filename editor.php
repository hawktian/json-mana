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

    #jsoneditor {
      width: 98%;
      height: 600px;
    }
  </style>
</head>
<body>

<div id="jsoneditor"></div>
<div>
    <p>
        <input type=input name=name value='' placeholder='name' />
        <button onclick=save();>保存</button>
    </p>
</div>

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

  var json = {}; 
  var editor = new JSONEditor(container, options, json);

var save= function(){
	var name = document.querySelector("input[name=name]").value;
	var url = 'save.php?name='+name;
    var data = editor.getText();
	fetch(url, {
        method: 'POST',
        body: data,
        headers:{
        'Content-Type': 'application/json'
        }
	}).then(res => res.json())
    .then(function(response){window.location.href = response.url})
	.catch(error => console.error('Error:', error));
}
</script>
</body>
</html>
