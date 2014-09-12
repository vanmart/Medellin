<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
     <title>Medellin by Vanmartc</title>
     {{ stylesheet_link_tag() }}
     <style>
       body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
     </style>
     {{ javascript_include_tag() }}
     <meta name="viewport" content="width=device-width, initial-scale=1" maximum-sacale=1  user-scalable=no>
</head>
<body>
	<div id="div_1">
	    <div id="div_2">xxx</div>
	    <div id="div_3">yyy</div>
	    <div id="div_4">zzz
	        <div id="div_5">yyy</div>
	    </div>
	    <div id="div_6">www</div>
	</div>
	<script>
	    var div = $('#div_6');
	    console.log(div.html());
	    console.log(div.parent().attr('id'));
	</script>
</body>
</html>



