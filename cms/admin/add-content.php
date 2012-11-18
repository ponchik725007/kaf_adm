<?php
include '../cms_class.php';

 $obj=new modernCMS();
 $obj->host='localhost';
 $obj->username='root';
 $obj->password='p3ieIMsc';
 $obj->db='moderncms';
 
 $obj->connect();
?>
<head>
<title>My cms
</title>
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" charset="utf-8">
</head>
<body>
<div id="page-wrap">
<?php
		include'nav.php';
		?>
	
		<form method="post" action="index.php">
		<input type="hidden" name="add" value="true">
			<div>
				<label for="title"> Заголовк:</label>
				<input type="text" name="title" id="title" style="width:300%;">
			</div>
			<div>
				<label for="main"> Основная часть:</label>
				<textarea  name="main" id="main" rows="20" cols="100"></textarea>
			</div>
			<div>			
	<label for="body">Полный текст:</label>
	<textarea name="body" id="body" rows="20" cols="100"></textarea>
</div>	
	<input type="submit" name="submit" value="Добавить">	
		</form>
</div>

</body>
</html>