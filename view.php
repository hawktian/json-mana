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

    .title_input{
        font-size: 18px;
        line-height: 30px;
        width:500px;
    }

    .head{
        width:98%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .head a {
        font-size:1.2rem;
        text-decoration:none;
    }

    #jsoneditor {
      width: 98%;
        height:98vh;
    }


  </style>
</head>
<body>
<div class=head>
<h1 id=title><?php echo $_GET['name'];?></h1>
<a href='index.php' target=_self>index&#9166;</a>
</div>
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

var name = '<?php echo $_GET['name']; ?>';
var json = <?php echo $json; ?>;
var editor = new JSONEditor(container, options, json);

document.getElementById('title').ondblclick = function() {
    this.innerHTML = "<input class=title_input id='title_input' onblur=rename() type=text value='"+this.innerText+"'>";
    document.getElementById('title_input').focus();
    document.getElementById('title_input').addEventListener("keyup", ({key}) => {
        if (key === "Enter") {
            rename();
        }
    });
}

let rename= function(){
    var newname = document.getElementById('title_input').value;
	var url = 'rename.php?oldname='+name+'&newname='+newname;
	fetch(url, {
        method: 'GET',
	}).then(res => res.json())
        .then(function(response){
            if ( response.result == 'success' ) {
                window.location.href = '/view.php?name='+newname;
            } else if ( response.result == 'failure' ) {
                alert(response.msg);
            }
        }).catch(error => console.error('Error:', error));
}
</script>
</body>
</html>
