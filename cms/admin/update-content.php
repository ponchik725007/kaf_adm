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
	<?php include'nav.php';?>
	
	<h2>Редактирование</h2>
	
	<?=$obj->update_content_form($_GET['id'])?>
	
</div>

</body>
</html>